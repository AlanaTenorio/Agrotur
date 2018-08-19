Feature: Ad Registration
  As a Advertiser
  I want to register a service or accommodation
  so that I can reach a larger customer number

Scenario: Insert an service ad entering the data correctly
  Given that I am logged as user "maria@gmail.com"
  And I am on the "Cadastrar Anuncio" page
  And there isn't a service with "Título do anúncio" equals "Hotel Gualadahara"
  And "Preço da experiência" equals "60"
  And "Descrição do anúncio" equals "Hotelzin bacana"
  And "Cidade" equals "Garanhuns"
  And "Estado" equals "Pernambuco"
  And "Rua" equals "Rua Sem Nome"
  And "Número" equals "70"
  And "Bairro" equals "Bairro Sem Nome"
  And "CEP" equals "55292290"
  When I fill in "Título do anúncio" with "Hotel Gualadahara"
  And "Preço da experiência" with "60"
  And "Descrição do anúncio" equals "Hotelzin bacana"
  And "Cidade" equals "Garanhuns"
  And "Estado" with "Pernambuco"
  And "Rua" with "Rua Sem Nome"
  And "Número" with "70"
  And "Bairro" with "Bairro Sem Nome"
  And "CEP" with "55292290"
  And I press "Continuar"
  And on the "Inserir Imagens" page I press "Concluir"
  Then I should be on the "Exibir Servico" page
