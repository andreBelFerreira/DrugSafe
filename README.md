# 💊 DrugSafe — Sistema de Gerenciamento de Remédios
DrugSafe é um sistema web moderno para cadastro, monitoramento e gestão de medicamentos, com foco na **segurança do paciente**, **alertas de validade**, e **controle de prescrições médicas**.

---
## 📦 Tecnologias Utilizadas
- **PHP 7.x / 8.x**
- **CodeIgniter 3**
- **MySQL**
- **Tailwind CSS 3**
- **Bootstrap 5 (suporte visual complementar)**
- **JavaScript (AJAX nativo)**

---
## 🎯 Funcionalidades

### ✅ Módulo de Remédios
- Cadastro de remédios com:
  - Nome, descrição, validade, quantidade
  - Data da prescrição
  - Dosagem
  - Médico responsável
  - Upload da receita médica (imagem)
  - Vinculação ao hospital de origem
- Listagem de todos os remédios no Dashboard
- Alerta visual para **remédios vencidos**
- Filtro inteligente por hospital
### ✅ Módulo de Hospitais
- Cadastro e listagem de hospitais parceiros
- Associação de remédios aos hospitais
- Busca dinâmica com AJAX para seleção no cadastro de remédio
### ✅ Módulo de Interações (Beta)
- Simulação de interações medicamentosas com base em combinações pré-definidas
- Preparado para integração com APIs de farmácia ou OCR

---
## ⚙️ Como rodar localmente

### 1. Clone o repositório

```bash
git clone https://github.com/andreBelFerreira/DrugSafe.git
````

### 2. Configure o ambiente

* Coloque os arquivos em seu ambiente local (`htdocs` ou `www` do XAMPP, Laragon, etc.)
* Crie um banco de dados `drugsafe`
* Importe o arquivo `drugsafe.sql` com as tabelas (ou crie manualmente seguindo os campos do sistema)

### 3. Configure o CodeIgniter

* Edite o arquivo `application/config/config.php` e ajuste a base URL:

```php
$config['base_url'] = 'http://localhost/drugsafe/';
```

* Configure o banco de dados em `application/config/database.php`:

```php
'hostname' => 'localhost',
'username' => 'root',
'password' => '',
'database' => 'drugsafe',
'dbdriver' => 'mysqli',
```

### 4. Criar a pasta de uploads

```bash
mkdir uploads
mkdir uploads/receitas
chmod -R 777 uploads
```

---

## 🧠 Estrutura de Pastas

```
/application
  /controllers
    Dashboard.php
    Remedios.php
    Hospital.php
  /models
    Remedio_model.php
    Hospital_model.php
  /views
    dashboard.php
    Remedios.php
    hospital_listar.php
    hospital_cadastrar.php
/assets
  /css, /js (se usar)
```

---
## 🔐 Segurança
* Sistema preparado para login e controle por nível (admin e usuário comum)
* Mas no modo atual, está aberto para uso livre (protótipo)
* Fácil ativar proteção com `verificar_login()` e session

---
## 📌 Futuras melhorias
* Integração com OCR para leitura de receitas médicas
* API de interações medicamentosas reais (ex: DrugBank)
* Notificações por e-mail para remédios prestes a vencer
* Gerenciamento de perfis: paciente, médico, admin

---
## 👨‍⚕️ Autor / Manutenção

**Desenvolvido por:** \André Belmonte
**GitHub:** [andreBelFerreira (André Luiz Belmonte Ferreira)](https://github.com/andreBelFerreira)
