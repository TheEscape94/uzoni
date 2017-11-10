@extends('layouts.app')

@section('content')
    <section class="pull-left full-width register grey">
	<div class="full-width register-background"></div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="register-head terms-head">
					<p>Pravila i uslovi korišćenja</p>
					<span class="terms-dec"></span>
					<div class="clr"></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="register-body">
					<section class="terms-section">
						<h2>Uvod</h2>
						<span class="terms-dec-small"></span>
						<div class="clr"></div>
						<p>Portal <strong>uzoni.rs</strong> je vlasništvo kompanije Uzoni d.o.o.. Za vreme korišćenja portala tezga.rs 
primenjuju se ovde navedena Pravila i uslovi korišćenja, kao i svi važeći i primenjivi zakoni. uzoni.rs zadržava pravo promene ovih Pravila i uslova korišćenja u bilo kojem trenutku i bez prethodnog najavljivanja. Promene stupaju na snagu tek nakon njihovog objavljivanja.</p>
					</section>
					<section class="terms-section">
						<h2>Registracija, oglašavanje</h2>
						<span class="terms-dec-small"></span>
						<div class="clr"></div>
						<p>Pre korišćenja usluge predaje oglasa na <strong>uzoni.rs</strong> neophodna je registracija korisnika. 
						<br/> Registracija je besplatna i obavlja se prijavom na uzoni.rs, tako što korisnik unese lične 
podatke (ime, prezime, adresu i poštanski broj, email itd.) i šifru. Na datu email adresu korisniku od uzoni.rs stiže registracioni email. Klikom na link u registracionom email-u korisnik potvrđuje svoju registraciju. Takođe, registracija se može izvršiti i putem postojećeg Facebook ili Google naloga.</p>

						<p>Registrovani korisnik usluga, prijavom na sajt (aplikaciju) može postavljati komercijalne poruke i/ili koristiti sistem elektronskih poruka za kontakt sa drugim korisnicima usluga.</p>

						<p>Jedan korisnik usluga može imati samo jedan registrovani nalog.</p>

						<p>Registrovani korisnik usluga, ima sva prava i obaveze koji proističu iz Zakona o oglašavanju Republike Srbije.</p>

						<p>U skladu sa članom 19. Zakona o oglašavanju Republike Srbije, za oglašavanje na portalu uzoni.rs neophodno je popuniti deklaraciju sa tačnim i istinitim podacima oglašivača. Podaci uneti u formular prilikom registracije i predaje oglasa čine Deklaraciju. Bezuslovnim prihvatanjem Pravila i uslova korišćenja smatra se da je korisnik potpisao Deklaraciju.</p>

						<p>Za istinitost i tačnost podataka svaku vrstu odgovornosti i moguće sankcije snosi isključivo davalac podataka u skladu sa Krivičnim zakonom Repubike Srbije, član 301.</p>

						<p>Registrovani korisnik usluga ne mora uneti ove podatke, ali u tom slučaju ne može koristiti servis. Registracijom za korišćenje usluga korisnik prihvata mogućnost da bude kontaktiran na broj telefona ili email u svrhu realizacije prodaje/kupovine iz oglasa, pitanjima u vezi oglasa ili u vezi pomoći, kao i bilo kojom promotivnom aktivnošću od strane <strong>uzoni.rs</strong>.</p>

						<p>Oglašavanje mora biti u skladu sa Zakonom o oglašavanju Republike Srbije i Zakonom o autorskom i srodnim pravima. Svaki oglas koji nije u skladu sa Zakonom o oglašavanju i Zakonom o autorskim i srodnim pravima biće obrisan sa uzoni.rs uz, ili bez, obaveštenja oglašivača.</p>

						<p><strong>Uzoni.rs</strong> svojim registrovanim korisnicima nudi uslugu besplatne komunikacije putem elektronskih poruka. Prilikom korišćenja ove automatizovane usluge zabranjeno je drugim korisnicima slati uvredljive poruke ili one koje nemaju veze sa oglasom, zatim spam poruke.</p>
					</section>
					<section class="terms-section">
						<h2>Zaštita autorskih prava</h2>
						<span class="terms-dec-small"></span>
						<div class="clr"></div>
						<p>Zabranjano je, u skladu sa Zakonom o autorskim i srodnim pravima Republike Srbije, bilo kakvo neovlašćeno kopiranje i “skidanje” sadržaja ili delova sadržaja objavljenih na <strong>uzoni.rs</strong>.</p>

						<p>Pod sadržajem se podrazumevaju tekstualni sadržaji stranica, oglasi, korisnički podaci, fotografije, logotipi, zanimljivosti, grafička rešenja i svi ostali sadržaji koji se po Zakonu o autorskom i srodnim pravima smatraju autorskim delom.</p>

						<p>Korisnik usluga – ponuđač(oglašivač) zadržava autorsko pravo nad pojedinačnim tekstom i slikama svoje komercijalne poruke – oglasa.</p>
					</section>
					<section class="terms-section">
						<h2>Sankcije</h2>
						<span class="terms-dec-small"></span>
						<div class="clr"></div>
						<p>Ukoliko korisnik na bilo koji način krši Pravila i uslove korišćenja, krši zakon ili ne poštuje zabrane, ometa ili usporava rad portala, uzoni.rs zadržava pravo zabraniti korisniku pristup tako što će privremeno ili trajno blokirati nalog za korišćenje.</p>

						<p>Uskraćivanje prava korišćenja usluge može se primeniti u cilju sprečavanja nastajanja štete ili kada određeni postupci od strane korisnika usluga mogu imati negativnog uticaja na poslovne aktivnosti uzoni.rs ili otežavati rad portala <strong>uzoni.rs</strong> i ako u tim slučajevima nije došlo do kršenja pravila i uslova korišćenja.</p>

						<p><strong>Uzoni.rs</strong> zadržava pravo preduzeti odgovarajuće pravne mere protiv tog korisnika i zahtevati nadoknadu za nastalu štetu ili gubitak.</p>
					</section>
					<section class="terms-section">
						<h2>Isključenje odgovornosti</h2>
						<span class="terms-dec-small"></span>
						<div class="clr"></div>
						<p><strong>Uzoni.rs</strong> isključuje sopstvenu odgovornost u skladu sa sledećim članovima Zakona o 
elektronskoj trgovini Republike Srbije:</p>
						<ul>
							<li>U skladu sa članom 16. Zakona o elektronskoj trgovini Republike Srbije, uzoni.rs nije 
    odgovorna za sadržaj elektronskih poruka koje korisnici razmenjuju koristeći sistem za   
    poruke <strong>uzoni.rs</strong></li>
    						<li>U skladu sa članovima 17. i 18. Zakona o elektronskoj trgovini Republike Srbije uzoni.rs nije 
    odgovorna za sadržaj podataka  skladištenih u bazi podataka i/ili objavljenih na <strong>uzoni.rs</strong></li>
    						<li>U skladu sa članom 19. Zakona o elektronskoj trgovini Republike Srbije, <strong>uzoni.rs</strong> nije odgovorna za sadržaj na drugim portalima u slučaju kada korisnici usluga u svojim oglasima  
    ili elektronskim porukama umeću linkove koji vode ka tim drugim portalima</li>
    						<li>U skladu sa članom 20. Zakona o elektronskoj trgovini Republike Srbije, portal <strong>uzoni.rs</strong> nije dužan da pregleda podatke koje je skladištio, preneo ili učinio dostupnim odnosno da ispituje okolnosti koje bi upućivale na nedopustivo delovanje korisnika usluga</li>
    						<li>Isključenje odgovornosti u slučaju nedostupnosti i neemitovanja oglasa</li>
    						<li>Iz razloga više sile ili tehničkih problema moguće je da uzoni.rs nije dostupna svima ili nekom delu svojih korisnika u toku određenih vremenskih perioda; u takvim slučajevima  
    <strong>uzoni.rs</strong> ne odgovara za eventualnu štetu nastalu zbog neemitovanja oglasa</li>
    						<li><strong>uzoni.rs</strong> zadržava pravo da iz bilo kog razloga odbije objavljivanje oglasa, i u tom slučaju ne odgovara za eventulanu štetu nastalu ovim činjenjem.</li>
						</ul>
					</section>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="clr"></div>
@endsection