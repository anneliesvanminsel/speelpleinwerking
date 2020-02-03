@extends('layouts.app')
@section('title')
	Speelplein voor monitoren
@endsection
@section('content')
	<main class="l-main section">
		<div class="h-row has-distance-y-l">
			<h1 class="section__header">
				Vrijwilliger worden
			</h1>
			<a class="button is-blue h-row" href="{{ route('register') }}">
				<i class="fas fa-user-plus"></i>
				<div>
					Maak snel een account aan!
				</div>
			</a>
		</div>
		
		<article id="info" class="article">
			<h2 class="article__title">Praktische informatie</h2>
			<div class="article__content index-hoofdleiding">
				<div class="h-row has-distance-y-m">
					<div class="ctn-image is-small is-left">
						<img src="https://images.pexels.com/photos/939702/pexels-photo-939702.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
					</div>
					<div>
						<h5 class="article__subtitle">Aankomen</h5>
						<p class="article__text">Zondagavond om 17u</p>
						<h5 class="article__subtitle">Vertrekken</h5>
						<p class="article__text">Zaterdag om 14u</p>
					</div>
				</div>
				
				<h5 class="article__subtitle">Wat breng je mee?</h5>
				
				<ul class="u-list">
					<li class="u-list__item">
						hoeslaken
					</li>
					<li class="u-list__item">
						slaapzak
					</li>
					<li class="u-list__item">
						hoofdkussen
					</li>
					<li class="u-list__item">
						slaapgerief
					</li>
					<li class="u-list__item">
						eigen mediactie
					</li>
					<li class="u-list__item">
						kleren die tegen een stootje kunnen
						<p>
							<i class="accent">
								Voorzie genoeg want ze kunnen vuil en/of bezweet worden na een hele dag spelen
							</i>
						</p>
					</li>
					<li class="u-list__item">
						zwemgerief
					</li>
					<li class="u-list__item">
						handdoekken
					</li>
					<li class="u-list__item">
						brooddoos
					</li>
					<li class="u-list__item">
						rugzak
					</li>
					<li class="u-list__item">
						toiletgerief
					</li>
					<li class="u-list__item">
						regenkledij
					</li>
					<li class="u-list__item">
						een zakcentje: de laatste avond sluiten we met z'n allen de week af in een café/jeugdhuis/...
					</li>
				</ul>
				
				<div class="ctn-image is-center is-large has-distance-y-l">
					<img src="https://images.pexels.com/photos/1231365/pexels-photo-1231365.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" alt="de huidige hoofdleiding">
				</div>
				
				<h5 class="article__subtitle">Wat laat je thuis?</h5>
				<ul class="u-list">
					<li class="u-list__item">
						Kostbare voorwerpen (als deze stuk of verloren gaan is dit
						niet onze verantwoordelijkheid, een GSM mag je natuurlijk wel meenemen).
					</li>
					<li class="u-list__item">
						drank
					</li>
					<li class="u-list__item">
						drugs
					</li>
					<li class="u-list__item">
						snoep
					</li>
				</ul>
			</div>
			
			<div class="ctn-image is-center is-large has-distance-y-l">
				<img src="{{asset("/img/sfeer/discimage.JPG")}}" alt="de huidige hoofdleiding">
			</div>
			
			<h5 class="article__subtitle">Extra informatie</h5>
			<p class="article__text">
				Indien je in een week wil komen waar geen vrije plaatsen meer zijn, kan je je toch nog inschrijven voor
				deze week, dan zetten we je op de <span class="info--blue"> wachtlijst</span>. Moest er dan een plaatsje vrijkomen, brengen we je op de
				hoogte. Je kan ook steeds al een andere week kiezen.
			</p>
			<p class="article__text">
				Als je je hebt ingeschreven voor een week, maar je kan om een of andere reden toch niet meer komen,
				vragen we toch om te bekijken of er niets geregeld kan worden opdat je toch nog kan komen.
				Indien blijkt dat je echt niet meer kan komen (wat we erg betreuren), kan je ons een mailtje
				sturen via <span class="accent">info@lentekindvakantiewerking.be</span>. Doe dit echter enkel als het niet anders kan,
				met dank voor uw begrip.
			</p>
		</article>
		
		<div class="ctn-image is-center is-large has-distance-y-l">
			<img src="{{asset("/img/sfeer/picture.jpg")}}" alt="de huidige hoofdleiding">
		</div>
		
		<article id="faq" class="article">
			<h2 class="article__title">Veelgestelde vragen</h2>
			
			<div class="article__content">
				<div class="faq">
					<div class="faq__item" id="faq-1">
						<button class="faq__question" data-target="faq-1">
							<div class="faq__title">
								Moet ik iets voorbereiden voor ik naar Lentekind kom?
							</div>
							<i class="fas fa-chevron-down"></i>
						</button>
						<div class="faq__answer">
							Je weet op voorhand niet bij welke speelgroep je zal belanden, dus je kan nog niets
							specifieks voorbereiden. Elke avond krijgen jullie tijd om de activiteiten van de
							volgende dag voor te bereiden. Wij hebben op lentekind ook tal van boekjes en materiaal
							waar je inspiratie kan halen. Ook zal de hoofdleiding tijdens de voorbereiding geregeld
							rondkomen om op eventuele vragen te antwoorden.
						</div>
					</div>
					
					<div class="faq__item" id="faq-2">
						<button class="faq__question" data-target="faq-2">
							<div class="faq__title">
								Kan ik kiezen bij welke groep ik sta?
							</div>
							<i class="fas fa-chevron-down"></i>
						</button>
						<div class="faq__answer">
							Aan het begin van de week is er een kennismaking, rondleiding en uitleg van de speelgroepen.
							Hierbij vragen we naar welke speelgroepen jouw voorkeur uitgaat. Vervolgens verdeelt de
							hoofdleiding de vrijwilligers over de speelgroepen en krijgen jullie al meteen tijd om de
							eerste dag voor te bereiden.
						</div>
					</div>
					
					<div class="faq__item" id="faq-3">
						<button class="faq__question" data-target="faq-3">
							<div class="faq__title">
								Moet ik tijdens het eten ook voor de kinderen zorgen?
							</div>
							<i class="fas fa-chevron-down"></i>
						</button>
						<div class="faq__answer">
							Neen, 's middags nemen de kinderen van thuis boterhammen mee, en krijgen ze soep van lentekind.
							Hier houden 2 HL toezicht bij terwijl de VW's met de overige hoofdleiding een warm middagmaal
							verorberen. Tegen 17 uur gaan de kinderen naar huis, dus ook 's avonds kunnen we zelf op ons gemak eten.
						</div>
					</div>
					
					<div class="faq__item" id="faq-4">
						<button class="faq__question" data-target="faq-4">
							<div class="faq__title">
								Is het mogelijk om later aan te komen of vroeger te vertrekken?
							</div>
							<i class="fas fa-chevron-down"></i>
						</button>
						<div class="faq__answer">
							Wij vragen steeds om de volledige week op lentekind te blijven. Dit wil zeggen: zondag 17
							uur tot zaterdag 14 uur. Dit omdat we elke week met nieuwe vrijwilligers zitten en we toch
							steeds proberen om een hechte band te creëren onderling. Dit lukt het best als iedereen de
							volledige week aanwezig is. Moet je toch vroeger weg of zal je later toekomen, laat dit dan
							zo snel mogelijk (voor de start van de week!) weten aan de hoofdleiding via
							<span class="accent">info@lentekindvakantiewerking.be</span>.
						</div>
					</div>
					
					<div class="faq__item" id="faq-5">
						<button class="faq__question" data-target="faq-5">
							<div class="faq__title">
								Mag ik bezoek ontvangen op Lentekind?
							</div>
							<i class="fas fa-chevron-down"></i>
						</button>
						<div class="faq__answer">
							<p>
								Neen. Het is niet de bedoeling dat je in je week Lentekind bezoek ontvangt van familie,
								vriendjes of vriendinnetjes. Met de vrijwilligersgroep verblijven we een hele week in het
								centrum, of we trekken er samen op uit. Dat komt de sfeer alleen maar ten goede.
							</p>
							<p>
								Je ouders en vrienden mogen je wel komen brengen en halen en zijn steeds welkom om
								(kort) een kijkje te nemen in onze lokalen. Zo kunnen ook zij een blik opvangen van onze werking.
							</p>
							<p>
								Kan je het thuisfront echt niet missen, dan kan je altijd vragen een kaartje te sturen
								(Hoogstraat 13, 2340 Vlimmeren)!
							</p>
						</div>
					</div>
					
					<div class="faq__item" id="faq-6">
						<button class="faq__question" data-target="faq-6">
							<div class="faq__title">
								Wat moet ik meenemen naar Lentekind?
							</div>
							<i class="fas fa-chevron-down"></i>
						</button>
						<div class="faq__answer">
							Om de kids te entertainen, is quasi alles ter plaatse. Er zijn wel een aantal dingen waar
							je zelf moet voor zorgen:
							
							<ul class="u-list">
								<li class="u-list__item">
									Slaapgerief: hoofdkussen, kussensloop, hoeslaken, slaapzak (of donsdeken of lakens)
								</li>
								<li class="u-list__item">
									Toiletgerief (een verzorgde persoonlijke hygiëne is een goede eigenschap
									waarvoor de kids, je mede-VWs en de hoofdleiding je dankbaar zijn)
								</li>
								<li class="u-list__item">
									Zwemgerief : op warme dagen gebeurt het al wel eens dat we gaan zwemmen
								</li>
								<li class="u-list__item">
									Kleding die tegen een stootje kan: naar Lentekind komen is niet hetzelfde als naar een mondeling examen gaan!
								</li>
								<li class="u-list__item">
									Identiteits- en SISkaart (als je dit nog hebt): die moet je nu eenmaal overal bij hebben
								</li>
								<li class="u-list__item">
									Een beetje zakgeld: voor als je 's avonds na het eten nog iets fris wil drinken.
								</li>
								<li class="u-list__item">
									Een rugzak: voor de uitstap.
								</li>
							</ul>
							En als je thuis knutselmateriaal hebt, of speelgoed hebt waar je niets meer mee doet,
							of verkleedkleren die al jarenlang op zolder liggen, breng het gerust mee naar Lentekind!
							De kids zullen u dankbaar zijn!
						</div>
					</div>
					
					<div class="faq__item" id="faq-7">
						<button class="faq__question" data-target="faq-7">
							<div class="faq__title">
								Om hoe laat moet ik gaan slapen?
							</div>
							<i class="fas fa-chevron-down"></i>
						</button>
						<div class="faq__answer">
							Hier hebben we geen specifiek uur op geplakt, maar we zeggen altijd: zolang je de volgende
							dag fit op het plein staat en niemand er iets van merkt, mag je gaan slapen wanneer je wil.
						</div>
					</div>
					
					<div class="faq__item" id="faq-8">
						<button class="faq__question" data-target="faq-8">
							<div class="faq__title">
								Zijn de vrijwilligers's avonds vrij?
							</div>
							<i class="fas fa-chevron-down"></i>
						</button>
						<div class="faq__answer">
							<p>
								Wanneer de kinderen naar huis gaan, maken wij ons klaar voor het Grote Opruimmoment.
								Iedere vrijwilliger krijgt een taak toebedeeld, zo verloopt het opruimen ontzettend vlot.
								Als alles terug netjes op orde ligt, is het tijd om te eten. Hierna houden we elke dag
								een korte 'vergadering': samen met alle vrijwilligers en hoofdleiding overlopen we de
								voorbije dag. Dit is het ideale moment om een grappige anekdote in de groep te gooien,
								maar ook om eventuele problemen te signaleren.
							</p>
							<p>
								Na de vergadering (meestal rond 19u30) bereid je samen met je mede-vrijwilliger(s)
								de volgende dag voor (spel bedenken, materiaal klaarzetten, dingen knutselen, ...).
								Elke dag mogen er ook 2 vw's naar de leefgroepen gaan om daar de opvoeders te helpen
								door even op de kinderen te letten, terwijl de opvoeders zelf de kleinsten in hun bed leggen.
								Wanneer alles klaar is voor je activiteit van de volgende dag, ben je vrij. Meestal
								wordt er nog met de hele vw'groep een avondspel georganiseerd. In principe ben je niet
								verplicht om aan deze avondactiviteiten deel te nemen, maar meestal zijn dit net de
								fijnste momenten en leer je zo de andere vrijwilligers beter kennen. Hierna is er nog
								tijd om in de zeteltjes te chillen.
							</p>
						</div>
					
					</div>
					
					<div class="faq__item" id="faq-9">
						<button class="faq__question" data-target="faq-9">
							<div class="faq__title">
								Mag ik alcohol drinken op Lentekind?
							</div>
							<i class="fas fa-chevron-down"></i>
						</button>
						<div class="faq__answer">
							<p>
								Nadat alle voorbereidingen van de volgende dag zijn afgelopen en na de avondactiviteit,
								kan er in de zeteltjes iets gedronken worden. Wij bieden drinken aan voor 50 cent per
								consumptie en hieronder zit ook bier en kriek.
							</p>
							<p>
								Ook hier geldt dezelfde regel zoals hierboven: Als dit geen invloed heeft op hoe
								je de volgende dag op het plein verschijnt is dit geen probleem.
							</p>
						</div>
					</div>
					
					<div class="faq__item" id="faq-10">
						<button class="faq__question" data-target="faq-10">
							<div class="faq__title">
								Ik heb me ingeschreven, maar ik kan toch niet komen. Wat moet ik doen?
							</div>
							<i class="fas fa-chevron-down"></i>
						</button>
						<div class="faq__answer">
							Eerst en vooral: probeer situaties als deze te vermijden. Het is nooit fijn als er op de
							valreep ineens nog mensen afbellen. Maar er kunnen inderdaad onvoorziene omstandigheden
							zijn die er voor zorgen dat je op het laatste moment niet kan komen. Dan zal de hoofdleiding
							hiervoor wel begrip opbrengen. Als je nog voor de zomer je inschrijving wil annuleren,
							volstaat een mailtje naar <span class="accent">info@lentekindvakantiewerking.be</span>. Tijdens de zomer bel je
							best op de gsm van de vakantiewerking (0486/79.69.90) . Nemen we niet op? Spreek dan een
							boodschap in.
						</div>
					</div>
					
					<div class="faq__item" id="faq-11">
						<button class="faq__question" data-target="faq-11">
							<div class="faq__title">
								Ben ik verzekerd tegen ongevallen?
							</div>
							<i class="fas fa-chevron-down"></i>
						</button>
						<div class="faq__answer">
							Iedereen die als vrijwilliger in Lentekind een handje komt toesteken, wordt door het CKG
							Lentekind verzekerd voor burgerlijke aansprakelijkheid en arbeidsongevallen.
						</div>
					</div>
					
					<div class="faq__item" id="faq-12">
						<button class="faq__question" data-target="faq-12">
							<div class="faq__title">
								Word ik betaald?
							</div>
							<i class="fas fa-chevron-down"></i>
						</button>
						<div class="faq__answer">
							Je krijgt een financiële vergoeding van 15 euro als bijdrage in je verplaatsingsonkosten
							en je mag gratis blijven slapen en eten. Voor het geld moet je dus niet naar Lentekind
							komen, dan kan je beter een vakantiejob gaan doen aan de kassa van de Delhaize.
							Maar krijg je daar dezelfde sfeer die je tijdens een week Lentekind ervaart? Hell no!
						</div>
					</div>
					
					<div class="faq__item" id="faq-13">
						<button class="faq__question" data-target="faq-13">
							<div class="faq__title">
								Slapen jongens en meisjes in aparte slaapkamers? Mijn ouders willen  dit graag weten.
							</div>
							<i class="fas fa-chevron-down"></i>
						</button>
						<div class="faq__answer">
							Er is een slaapzaal voor de jongens en een voor de meisjes. Zeg tegen je ouders dat
							ze zich absoluut geen zorgen hoeven te maken.
						</div>
					</div>
					
					<div class="faq__item" id="faq-14">
						<button class="faq__question" data-target="faq-14">
							<div class="faq__title">
								A​ls ik twee weken na elkaar wil doen, kan ik dan op Lentekind blijven  om die dag te overbruggen?
							</div>
							<i class="fas fa-chevron-down"></i>
						</button>
						<div class="faq__answer">
							Neen. Zaterdagmiddag gaan alle deuren van de vakantiewerking onherroepelijk dicht tot de
							dag erna. De hoofdleiding wisselt ook van week tot week en van zaterdagmiddag tot
							zondagmiddag is er niemand van de vakantiewerking aanwezig.
						</div>
					
					</div>
					
					<div class="faq__item" id="faq-15">
						<button class="faq__question" data-target="faq-15">
							<div class="faq__title">
								Ik heb een animatorencursus gevolgd en ik moet stage doen. Kan dit  bij Lentekind?
							</div>
							<i class="fas fa-chevron-down"></i>
						</button>
						<div class="faq__answer">
							Dat is geen enkel probleem. Laat het wel weten aan de hoofdleiding (bij je inschrijving).
							Je brengt dan gewoon je stageboekje mee naar Lentekind. Eén iemand van de hoofdleiding
							zal zich die week met je bezighouden en elke avond persoonlijk de dag met je overlopen.
						</div>
					</div>
				</div>
			</div>
		</article>
		<script src="{{ asset('js/faq.js') }}" > </script>
	
	</main>
@endsection
