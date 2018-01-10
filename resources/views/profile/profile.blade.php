@extends('layouts.app')


@section('style')

@endsection
@section('content')
    <form name="sylius_customer_registration" method="post" action="/de_DE/register" class="ui loadable form" novalidate="novalidate">
        <h4 class="ui dividing header">Persönliche Informationen</h4>
        <div class="two fields">
            <div class="required field"><label for="sylius_customer_registration_firstName" class="required">Vorname</label><input type="text" id="sylius_customer_registration_firstName" name="sylius_customer_registration[firstName]" required="required" /></div>
            <div class="required field"><label for="sylius_customer_registration_lastName" class="required">Nachname</label><input type="text" id="sylius_customer_registration_lastName" name="sylius_customer_registration[lastName]" required="required" /></div>
        </div>
        <div class="required field"><label for="sylius_customer_registration_email" class="required">E-Mail</label><input type="email" id="sylius_customer_registration_email" name="sylius_customer_registration[email]" required="required" /></div>
        <div class="field"><label for="sylius_customer_registration_phoneNumber">Telefonnummer</label><input type="text" id="sylius_customer_registration_phoneNumber" name="sylius_customer_registration[phoneNumber]" /></div>
        <div class="field">
            <div class="ui toggle checkbox"><input type="checkbox" id="sylius_customer_registration_subscribedToNewsletter" name="sylius_customer_registration[subscribedToNewsletter]" value="1" /><label for="sylius_customer_registration_subscribedToNewsletter">Newsletter abonnieren</label></div>
        </div>
        <h4 class="ui dividing header">Zugangsdaten</h4>
        <div class="required field"><label for="sylius_customer_registration_user_plainPassword_first" class="required">Passwort</label><input type="password" id="sylius_customer_registration_user_plainPassword_first" name="sylius_customer_registration[user][plainPassword][first]" required="required" /></div>
        <div class="required field"><label for="sylius_customer_registration_user_plainPassword_second" class="required">Bestätigung</label><input type="password" id="sylius_customer_registration_user_plainPassword_second" name="sylius_customer_registration[user][plainPassword][second]" required="required" /></div>



        <button type="submit" class="ui large primary button">
            Accounterstellung
        </button>
        <input type="hidden" id="sylius_customer_registration__token" name="sylius_customer_registration[_token]" value="9fj7qU-IHKiNIavHYXtm2u_Fffs6FG1nGsHOKH0M8Ws" />
    </form>
@endsection
@section('js')

@endsection