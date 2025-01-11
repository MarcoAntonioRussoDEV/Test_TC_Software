# ToDo List

## Descrizione

Questo progetto è un'applicazione web sviluppata utilizzando il framework Laravel e Livewire. L'applicazione consente di gestire una lista di attività (To-Do List) con funzionalità avanzate come il filtraggio, l'ordinamento e la gestione dello stato delle attività.

## Funzionalità

- **Gestione delle attività**: Creazione, modifica e cancellazione delle attività.
- **Filtraggio e ordinamento**: Filtraggio e ordinamento delle attività per vari criteri.
- **Aggiornamenti in tempo reale**: Utilizzo di Livewire per aggiornamenti dinamici senza ricaricare la pagina.
- **Responsive Design**: Interfaccia utente adattiva per dispositivi desktop e mobile.

## Struttura del Progetto

### Componenti Livewire

- **Desktop\TableComponent**: Componente principale per la visualizzazione e la gestione delle attività in modalità desktop.
- **Mobile\TableComponent**: Componente principale per la visualizzazione e la gestione delle attività in modalità mobile.
- **Desktop\FilterTableHead**: Componente per la gestione dell'intestazione della tabella con funzionalità di filtraggio e ordinamento.
- **TaskForm**: Componente per la creazione e la modifica delle attività.
- **Toast**: Componente per la visualizzazione di notifiche.
- **DestructiveModal**: Componente per la gestione delle azioni distruttive con conferma.
- **Mobile\ShowModal**: Componente per la visualizzazione di modali in modalità mobile.

### Modelli

- **Task**: Modello per la gestione delle attività. Include metodi per impostare lo stato delle attività (`setCompleted`, `setPending`).

### File di Configurazione

- **composer.json**: File di configurazione di Composer per la gestione delle dipendenze PHP.
- **tailwind.config.js**: File di configurazione di Tailwind CSS per la personalizzazione degli stili.

### File di Visualizzazione

- **resources/views/livewire/todo-list.blade.php**: Vista unica per applicazione single-page 

### File JavaScript

- **resources/js/app.js**: File JavaScript principale per la gestione degli eventi e delle funzionalità dinamiche.



## Autori

- **Marco Antonio Russo** - [GitHub](https://github.com/marcoantoniorussoDEV)

## Altro

Progetto eseguito come test di valutazione per TC Software.