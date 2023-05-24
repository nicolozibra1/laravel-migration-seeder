## Indice dei contenuti

- [Laravel Model Controller](#laravel-model-controller)
  - [Funzionalità](#funzionalità)
  - [Requisiti di Sistema](#requisiti-di-sistema)
  - [Installazione](#installazione)
  - [Utilizzo](#utilizzo)
  - [Screenshot](#screenshot)
    - [Homepage](#homepage)
    - [Dettaglio](#dettaglio)

## Funzionalità
 Genera un biglietto del treno e mostra tutti i treni in partenza.
- I dati inseriti nel form, generano un biglietto.
- Tutti i dettagli dei treni in partenza sono raffigurati all'interno di una tabella. (Questi provengono da un database).

## Requisiti di sistema

- PHP >= 8.0
- Laravel >= 9.0
## Installazione

1. Clona il repository del progetto.
2. Esegui `composer install` per installare le dipendenze.
3. Crea un file `.env` e configura le impostazioni del database.
4. Esegui `npm install` per installare le dipendeze.
5. Esegui `php artisan serve` per avviare il server locale.
6. Esegui `npm run dev` per avviare il server locale.
7. Avvia il serve MAMP.
## Utilizzo

1. Accedi alla homepage all'indirizzo [http://localhost:8000](http://localhost:8000).
2. Genera un biglietto inserendo i dati all'interno del form.
3. Nel biglietto saranno presenti i tuoi dati e ti sarà assegnato un posto ed una carrozza casuali.
4. Puoi scorrere la pagina e trovare una tabella con tutti i treni in partenza.

## Screenshot
##### Homepage
![Homepage](/public/screenshots/homepage.png)
##### Ticket
![Ticket](/public/screenshots/ticket.png)
##### In partenza
![Departing](/public/screenshots/departing.png)

