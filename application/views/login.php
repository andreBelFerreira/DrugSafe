<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - DrugSafe</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-blue-50 to-white min-h-screen flex items-center justify-center font-['Inter']">

  <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Entrar no DrugSafe</h2>

    <form action="<?= site_url('login/autenticar') ?>" method="post" class="space-y-4">
      <div>
        <label for="email" class="block text-sm font-semibold text-gray-600">Email</label>
        <input type="email" name="email" id="email" required class="mt-1 w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
      </div>

      <div>
        <label for="senha" class="block text-sm font-semibold text-gray-600">Senha</label>
        <input type="password" name="senha" id="senha" required class="mt-1 w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
      </div>

      <button type="submit" class="w-full bg-blue-700 text-white py-2 rounded-lg font-semibold hover:bg-blue-800 transition">Entrar</button>
    </form>

    <p class="text-sm text-center text-gray-600 mt-4">
      Não tem uma conta?
      <a href="<?= site_url('usuario/cadastrar') ?>" class="text-blue-600 hover:underline">Cadastre-se</a>
    </p>
  </div>

</body>
</html>
