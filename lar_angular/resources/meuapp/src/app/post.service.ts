import { Injectable } from '@angular/core';
import { HttpClient, HttpEvent, HttpEventType } from '@angular/common/http';
import { Post } from './post';

@Injectable(
  // { providedIn: 'root'}
)
export class PostService {

  public posts: Post[] = [];

  constructor(private http: HttpClient) {
    this.http.get("/api/").subscribe(
      (posts: any[]) => {
        for(let p of posts) {
          this.posts.push(
            new Post(
              p.nome, p.titulo, p.subtitulo,
              p.email, p.mensagem, p.arquivo,
              p.id, p.likes
            )
          );
        }
      }
    );
  }

  salvar(post: Post, file: File) {
    const uploadData = new FormData();
      uploadData.append('nome', post.nome);
      uploadData.append('email', post.email);
      uploadData.append('titulo', post.titulo);
      uploadData.append('subtitulo', post.subtitulo);
      uploadData.append('mensagem', post.mensagem);
      uploadData.append('arquivo', post.arquivo);

      this.http.post("/api", uploadData)
        .subscribe((event: any) => {
          if (event.type == HttpEventType.Response) {
            console.log(event);
          }
        })
  }

}
