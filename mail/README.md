49.

Você ativou a opção "Permitir aplicativos menos seguros"? vá para este link

https://myaccount.google.com/security#connectedapps

Dê uma olhada no menu Login e segurança -> Aplicativos com acesso à conta.

Você deve ativar a opção "Permitir aplicativos menos seguros".

Se ainda não funcionar, tente um destes:

Vá para https://accounts.google.com/UnlockCaptcha e clique em continuar e desbloqueie sua conta para acessar outras mídias / sites.

Use aspas duplas na sua senha: "sua senha"

E mude seu arquivo .env

MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=dianexxxxx@gmail.com
MAIL_PASSWORD=xxxxxx
MAIL_ENCRYPTION=tls
porque aquele que você especificou no mail.php será usado apenas se o valor não estiver disponível no arquivo .env.
