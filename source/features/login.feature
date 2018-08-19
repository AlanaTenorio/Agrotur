Feature: Login
  As a User
  I want to sign in
  so that I can hire or advertise an ad

Scenario: Sign in with a registered user
  Given that there's an user "maria@gmail.com" with password "12345678" registered
  When I fill in "Email" with "maria@gmail.com"
  And I fill in "Senha" with "12345678"
  And I press "Login"
  Then I should be on the "Home" page

Scenario: Sign in with an unregistered user
  Given that there isn't an user "maria@gmail.com" with password "12345678" registered
  When I fill in "Email" with "maria@gmail.com"
  And I fill in "Senha" with "12345678"
  And I press "Login"
  Then I should see an error
  And I should be on the "Login" page

Scenario: Sign in with an valid password
  Given that there's an user "maria@gmail.com" with password "12345678" registered
  When I fill in "Email" with "maria@gmail.com"
  And I fill in "Senha" with "12345678"
  And I press "Login"
  Then I should be on the "Home" page

Scenario: Sign in with an invalid password
  Given that there's an user "maria@gmail.com" with password "12345678" registered
  When I fill in "Email" with "maria@gmail.com"
  And I fill in "Senha" with "password"
  And I press "Login"
  Then I should see an error
  And I should be on the "Login" page
