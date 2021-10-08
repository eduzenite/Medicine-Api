# Api de Medicamentos
Esse projeto visa testar e mostrar minha habilidades com o Framework Laravel, que utilizo para acelerar o desenvolvimento dos meus projetos. O projeto possui o front padrão do Laravel e todas as funcionalidades que desenvolvi estão disponíveis através de APIs.
Criei esse projeto me orientando pelos testes (TDD), que foram desenvolvidos primeiro e só então criei os Controllers. Para rodar esse projeto da sua máquina, siga os passos abaixo.

# Instalação
Para testar e analisar esse código, faço o clone do projeto na sua máquina ou em algum servidor, então, instale as dependências do projeto, criei o link simbólico do Storage e crie as tabelas no banco de dados.
```bash
$ composer install
$ php artisan storage:link
$ cp .env.testing .env
$ touch database/memory.sqlite
$ php artisan migrate
```

# Teste de carga
Para facilitar os testes, criei um script que irá popular as tabelas do banco com dados fakes.
```bash
$ php artisan db:seed --class=FakerSeeder
```
Um ponto importante desse script é que tive o cuidado de criar as factories que não precisam de conexão primeiro e cada vez que um item é criado as informações das outras tabelas ligados à esse item são criadas também. Como eu fiz isso? Dá uma olhada nesse código que você vai entender melhor:
```
Manufacturer::factory(10)->create()->each(function () {
    $Address = new Address();
    $Address->zipcode = $this->faker->postcode();
    $Address->country = $this->faker->country();
    $Address->state = $this->faker->sentence(3, true);
    $Address->city = $this->faker->city();
    $Address->district = $this->faker->sentence(3, true);
    $Address->address = $this->faker->address();
    $Address->number = $this->faker->buildingNumber();
    $Address->complement = $this->faker->firstNameMale();
    $Address->save();
    $Address->manufacturer()->sync($Address->id);
});
```
Toda vez que uma fábrica é criada eu crio um endereço para ela com a função each(). Ela possui uma tabela pivô e na última linha dentro dessa função eu também crio a ligação entre fábrica e endereço.


# Teste Unitários
Ao rodar os seguintes scripts, você será capaz de fazer testes unitários dentro da aplicação. Em cada um deles, vejo se a URL da API está retornando 200 e em alguns verifico o retorno do JSON.
```bash
$ php artisan test --filter AddressTest
$ php artisan test --filter CategoryTest
$ php artisan test --filter IngredientTest
$ php artisan test --filter ManufacturerTest
```

# Teste de Integração
Nesses testes eu verifico se as APIs de medicamento estão funcionando corretamente. Os testes MedicineNegativeTest verifico se está retornando corretamente o erro 404 para um medicamento não encontrado. Já nos testes MedicinePositiveTest verifico se as APIs estão listando, criando, exibindo, atualizando e deletando corretamente os itens do banco de dados.
```bash
$ php artisan test --filter MedicineNegativeTest
$ php artisan test --filter MedicinePositiveTest
```