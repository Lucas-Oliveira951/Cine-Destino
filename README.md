SISTEMA DE CADASTRO E LOGIN DE USUÁRIO
 
 
O sistema permite que novos usuários realizem um cadastro fornecendo qualquer endereço de e-mail, uma senha e uma foto de perfil. Durante o processo de registro, a senha não é armazenada em texto puro; em vez disso, o sistema utiliza a função password_hash do PHP, que aplica um algoritmo seguro de criptografia (como bcrypt) para gerar um hash único e protegido. Esse hash é o que é salvo no banco de dados, garantindo maior segurança.

No momento do login, o usuário informa e-mail e senha. O sistema então recupera o hash correspondente e utiliza a função password_verify para comparar a senha digitada com o hash armazenado. Se a verificação for bem-sucedida, o acesso é liberado e o usuário pode navegar autenticado.

A foto de perfil é enviada pelo usuário no cadastro e armazenada em uma pasta do servidor, enquanto o caminho do arquivo fica registrado no banco de dados. Assim, o sistema identifica e exibe a imagem sempre que o usuário estiver logado. Caso o usuário não definir uma foto de perfil, o sistema automaticamente definirá uma imagem padrão para a conta.
