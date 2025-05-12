Skrevet av: Mats Florell
Sist redigert: 12.05.2025
Description: Dette er et CRUD system som jeg programmerte i Java for å lære det i en periode med Praksis på Novari IKS. Deres bedrift har programmert løsninger i Java lenge og ønsket at jeg skulle lære det.

Dette er mitt første prosjekt gjort i Java, Jeg bruker Springboot og lagrer en liste med personobjekter i en Cache.
Lagde også en kjapp frontend i Javascript som kobler til ved bruk av XMLHTTP apien.

Backend har funksjonalitet til å:
VED GET REQUEST: hente ut hele listen med personer
VED GET REQUEST MED ID I PATH: hente ut enkelt person
VED DELETE REQUEST MED ID I PATH: slette enkelt person
VED POST REQUEST MED PERSON SOM JSON FORMAT I REQUESTBODY: Legge til enkelt person
VED PATCH REQUEST MED ID I PATH OG PERSON SOM JSON FORMAT I REQUESTBODY: Redigere enkelt person på ID

Frontend har funksjonalitet til å:
Lese ut hele person listen ved å sende "GET" request til server og å formatere listen inn i en tabell
Slette utvalgte personer i listen ved å sende "DELETE" request til server for alle utvalgte personer
Legge til en person ved å sende "POST" request til server med et json objekt laget ved bruk av forum

Koden er per 12. Mai 2025 ikke kommentert.
