<?php
ob_start();
?>

<div class="row">
    <div class="col-12">
        <h1 class="text-center mb-4">Sign OÜ kohta</h1>
        <p class="lead text-center">Tere tulemast Sign OÜ-sse! Oleme Narvas asuv elektroonikapood, mis on pakkunud kvaliteetseid tooteid ja teenuseid alates 1991. aastast. Meie eesmärk on rahuldada klientide vajadused, pakkudes laia valikut tehnikat ja professionaalset teenindust.</p>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <h3>Meie lugu</h3>
        <p>Sign OÜ alustas oma tegevust 1991. aastal ning on sellest ajast peale olnud usaldusväärne partner elektroonikaturul. Meie poes Narvas, Ida-Virumaal, pakume laia valikut arvutitehnikat, võrguseadmeid, kontoritehnikat, tarvikuid ja komponente. Lisaks toodame oma kaubamärgi all arvuteid, mis on kohandatud vastavalt klientide vajadustele. Meie meeskond on pühendunud kvaliteedile ja jätkusuutlikkusele, tagades, et iga klient lahkub poest rahulolevana.</p>
        <p>Lisaks müügile pakume ka arvutite ja elektroonikaseadmete remondi- ning hooldusteenuseid. Meie tehnikud on kogenud spetsialistid, kes suudavad lahendada erinevaid tehnilisi probleeme, alates riistvara riketest kuni tarkvara seadistamiseni. Sign OÜ on koht, kus tehnoloogia ja klienditeenindus kohtuvad, et pakkuda parimat kogemust.</p>
        <h3>Võta meiega ühendust</h3>
        <p>E-post: <a href="mailto:signnarva@gmail.com">signnarva@gmail.com</a></p>
        <p>Telefon: +372 56479047</p>
        <p>Aadress: Kreenholmi tn 4-1, Narva, Ida-Virumaa 21008, Eesti</p>
        <p>Tööaeg: E–R 9:00–18:00, L–P suletud</p>
    </div>
    <div class="col-md-6">
        <h3>Meie tooted ja teenused</h3>
        <p>Sign OÜ pakub mitmekülgset valikut tooteid, mis sobivad nii kodukasutajatele kui ka ettevõtetele. Meie sortimendis on:</p>
        <ul>
            <li>Arvutid ja sülearvutid – nii meie oma kaubamärgi all kui ka tuntud tootjatelt.</li>
            <li>Võrguseadmed – ruuterid, lülitid ja muud lahendused stabiilse võrgu loomiseks.</li>
            <li>Kontoritehnika – printerid, skannerid ja muud seadmed, mis muudavad tööprotsessid tõhusamaks.</li>
            <li>Komponendid ja tarvikud – alates kõvaketastest kuni hiirte ja klaviatuurideni.</li>
            <li>Remondi- ja hooldusteenused – kiire ja usaldusväärne teenindus teie seadmetele.</li>
        </ul>
        <p>Meie poest leiate alati uusimaid tehnoloogiaid ja lahendusi, mis vastavad kaasaegsetele nõuetele. Lisaks anname nõu, kuidas valida parim seade vastavalt teie vajadustele.</p>
        <div class="row">
            <div class="col-6 mb-3">
                <img src="../img/info1.png" class="img-fluid rounded" alt="Arvutid">
            </div>
            <div class="col-6 mb-3">
                <img src="../img/info2.png" class="img-fluid rounded" alt="Võrguseadmed">
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once 'layout.php';
?>