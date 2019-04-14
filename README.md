# Webprogrammering - Obligatorisk oppgave 3

Denne obligatoriske oppgaven bygger på forrige obligatoriske oppgave (oblig 2).

Tillegg for denne obligen:

- Det skal bare være personer som er autorisert som skal kunne registrere utøvere og øvelser. Det betyr at det må lages en registreringsfunksjon for administrative personer. Her skal navn og så videre registreres sammen med brukernavn og passord. Passordet skal lagres kryptert i databasen.
- De sidene som man kan registrere utøvere og øvelser skal så sperres slik at man må logge inn på en egen side for å komme til disse. Innloggingen skal sjekkes mot de registrerte administrative brukere.

Dette betyr at det skal lages følgende ny/endret funksjonalitet:

- En ny tabell hvor administrative personer kan lagres (med brukernavn og passord). Eventuelt kan andre tabeller utvides.
- En ny registreringsside for disse nye dataene.
- En ny innloggingsside for å kunne logge seg på som en administrativ person.
- Oppdatere sidene for registrering av utøvere og øvelser slik at det er bare administrative personer som kan komme inn på disse sidene etter at de er logget inn.

Det skal også lages validering av inputfeltene for den nye registreringssiden. Valideringen skal skje på server via PHP, og kan i tillegg gjøres på klient via JavaScript ved hjelp av regulære uttrykk (regex). (Det er altså ikke noe krav om validering i JavaScript.)

### Liste over utførte oppgaver

- [x] Kun autoriserte personer som kan registrere og endre informasjon
- [x] Sider som krever innlogging er sperret for uatorisert aksessering
- [x] Ny tabell er satt opp for administratorer på siden
- [x] Ny registreringsside for administratorer
- [x] Serverside validering av input når en ny administrator registrer seg

### Liste over ikke utførte oppgaver

- [ ] Clientside inputvalidering med javascript

## Known bugs

- Loginskjermen fra modal forsvinner selv om det er mislykket innlogging (må åpnes manuelt etter mislykkede innloggingsforsøk)

# Webprogrammering - Obligatorisk oppgave 2

Det skal lages et system for å holde rede på hvilke øvelser som avholdes under ski-VM i en database. Det skal lagres hvilke utøvere som deltar på de ulike øvelsene. Det skal også kobles publikum til de ulike øvelsene (det er dog ikke nødvendig å lage en bestillingsløsning).

Publikum og utøvere må kunne registrere seg med personlig informasjon. Videre må det være mulig å registrere og endre på øvelsesinformasjonen (slette og oppdatere).

### Toolkit used

- [Fontawesome](https://fontawesome.com/) - Brukt for ikoner

### Gjenstående oppgaver [TODO's]

- [x] Koble publikum til øvelser
- [x] Kunne slette øvelser
