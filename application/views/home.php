<?php
if (!function_exists('esc')) {
  function esc($string)
  {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
  }
}

?>

<!-- Conteúdo principal -->
<main class="pt-32 pb-20 px-4 max-w-5xl mx-auto">
  <section class="text-center mb-12">
    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Bem-vindo ao <span class="text-blue-700">DrugSafe</span></h2>
    <p class="text-lg text-gray-600 mb-8">Gerencie seus medicamentos e receba alertas inteligentes para evitar interações perigosas.</p>
  </section>

  <!-- Bloco azul -->
  <section class="bg-blue-700 text-white rounded-xl p-6 shadow-md mb-12">
    <h3 class="text-2xl font-bold mb-2">Por que escolher o DrugSafe?</h3>
    <p class="text-sm mb-4">Gerencie suas prescrições com facilidade, receba alertas e evite interações perigosas entre medicamentos.</p>
    <div class="flex space-x-4">
      <a href="<?= site_url('usuario/cadastrar') ?>" class="bg-white text-blue-700 px-4 py-2 rounded-md font-semibold shadow hover:bg-gray-100">Cadastre-se Agora</a>
      <a href="<?= site_url('login') ?>" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-md font-semibold shadow hover:bg-gray-300">Login</a>
    </div>
  </section>

  <!-- Tabela de remédios vencidos -->
  <section class="bg-white rounded-xl p-6 shadow-md">
    <h3 class="text-xl font-semibold text-gray-800 mb-4">⚠️ Remédios Vencidos</h3>

    <?php if (!empty($remedios_vencidos)): ?>
      <div class="overflow-x-auto">
        <table class="min-w-full table-auto border border-gray-200 text-sm">
          <thead class="bg-gray-100 text-gray-700 font-semibold">
            <tr>
              <th class="px-4 py-2 border">Nome</th>
              <th class="px-4 py-2 border">Validade</th>
              <th class="px-4 py-2 border">Quantidade</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($remedios_vencidos as $remedio): ?>
              <tr class="hover:bg-gray-50">
                <td class="px-4 py-2 border"><?= esc($remedio['nome']) ?></td>
                <td class="px-4 py-2 border text-red-600 font-semibold"><?= esc(date('d/m/Y', strtotime($remedio['validade']))) ?></td>
                <td class="px-4 py-2 border"><?= esc($remedio['quantidade']) ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php else: ?>
      <p class="text-gray-600">Nenhum remédio vencido encontrado.</p>
    <?php endif; ?>
  </section>
</main>