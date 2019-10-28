@auth
     <h4>Você está logado!</h4>
     <p>Id: {{ Auth::user()->id }}</p>
     <p>Nome: {{ Auth::user()->name }}</p>
     <p>Email: {{ Auth::user()->email }}</p>
@endauth

@guest
    <h4>Você não está logado!</h4>
@endguest