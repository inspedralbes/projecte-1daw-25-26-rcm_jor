# Sistema de Control d'Incidències — Grup 4 (Institut Pedralbes)

Aquesta plataforma és una aplicació web modular dissenyada per optimitzar, organitzar i fer el seguiment de les sol·licituds de suport tècnic a l'Institut Pedralbes. El sistema cobreix tot el cicle de vida de la incidència, des que l'usuari envia el formulari fins que el cos tècnic la resol i es generen les mètriques de rendiment.

---

## 🚀 Funcionalitats del Sistema

### 👤 Àrea d'Usuaris (Sol·licitants)
* **Creació de tiquets:** Formulari intuïtiu per reportar problemes indicant títol, àrea/departament, descripció detallada i data de l'esdeveniment.
* **Resum i validació:** Finestra de confirmació un cop enviat el tiquet, on es mostra un codi d'identificació (ID) únic i les dades registrades.
* **Històric públic:** Accés a les accions i comentaris que l'equip tècnic hagi marcat expressament com a "visibles per a l'usuari".

### 🛠️ Àrea de Gestió (Tècnics i Administradors)
* **Tauler de Control (Dashboard):** Mòdul d'analítica alimentat per MongoDB que recull les estadístiques d'accessos, gràfics amb l'evolució diària de visites, pàgines més utilitzades i els últims 10 registres de log.
* **Administració de tiquets:** Panell interactiu amb filtres i ordenació (per data o gravetat). Permet assignar prioritat, tipus d'incidència i tècnic encarregat mitjançant finestres modals.
* **Fitxa de detall:** Espai centralitzat per editar l'estat del tiquet, reassignar personal, canviar la urgència i afegir noves actuacions de manteniment.
* **Registre d'actuacions:** Control de cada intervenció tècnica especificant el temps invertit (en minuts) i l'opció de fer públic el comentari.
* **Automatització d'estats:** El sistema gestiona el flux de treball de manera automatitzada: canvia a "En Procés" en afegir la primera actuació i a "Finalitzat" en tancar el tiquet.
* **Mètriques per Tècnic:** Panell de rendiment que calcula el temps mitjà de resolució, tasques actives i tancades per cada professional, amb accés directe al seu historial de treball.
* **Mètriques per Departament:** Gràfics i informes del volum d'incidències rebudes, resoltes i acumulació d'hores per cada àrea de l'institut.
* **Avisos automatitzats:** Enviament de correus electrònics de notificació (via SMTP amb la llibreria PHPMailer) cada vegada que s'obre un tiquet.
* **Cercador directe:** Barra de navegació global per accedir de manera instantània a qualsevol tiquet introduint el seu ID.

---

## 🛠️ Stack Tecnològic

* **Programació Backend:** PHP 8.x (utilitzant l'extensió nativa `mysqli`).
* **Emmagatzematge Principal:** MySQL 8.0 (dades de tiquets i usuaris).
* **Emmagatzematge de Mètriques/Logs:** MongoDB (utilitzant la imatge local d'Atlas).
* **Interfície Gràfica (Frontend):** HTML5, CSS3 ràpid, i JavaScript modern per a la interactivitat.
* **Disseny i Estils:** Framework Bootstrap 5.3 (Tema *Slate* de Bootswatch) combinat amb Bootstrap Icons.
* **Dependències de PHP:** Gestionades mitjançant Composer (inclou `PHPMailer` i `mongodb/mongodb`).
* **Capa de Seguretat:** Protecció contra injeccions SQL mitjançant sentències preparades (*prepared statements*) i aïllament de claus privades en un fitxer `.env`.

---

## 🐳 Serveis de l'Entorn (Docker)

| Servei | Imatge | Port Local | Mmissió / Funció |
| :--- | :--- | :--- | :--- |
| **app** | *Build local* (Dockerfile) | `8080` | Servidor web i intèrpret de PHP |
| **db** | `mysql:8.0` | `3306` | Servidor de la Base de Dades Relacional |
| **phpmyadmin** | `phpmyadmin:latest` | `8081` | Administració web del motor MySQL |
| **mongodb** | `mongodb/mongodb-atlas-local` | `27019` | Base de dades NoSQL per a traces i logs |
| **mongo-express** | `mongo-express` | `8082` | Administració visual per a la col·lecció MongoDB |

---

## ⚙️ Instal·lació i Posada en Marxa

Segueix aquests passos per desplegar el projecte en entorn local:

### 1. Clonar el projecte
Aquest comandament descarrega el codi i et posiciona a la carpeta del repositori:
git clone https://github.com/inspedralbes/projecte-1daw-25-26-g4_sistema.git
cd projecte-1daw-25-26-g4_sistema

### 2. Variables d'entorn
Crea un arxiu anomenat .env dins del directori src/ i configura els paràmetres de connexió:
DB_HOST=db
DB_NAME=g4_incidencies_db
DB_USER=g4_developer
DB_PASS=g4_secure_password
MONGODB_INITDB_ROOT_USERNAME=admin_g4
MONGODB_INITDB_ROOT_PASSWORD=secret_g4

### 3. Instal·lar les dependències
Accedeix a la carpeta del codi font i descarrega els paquets de Composer:
cd src
composer install
cd ..

### 4. Aixecar els contenidors de Docker
Inicia l'arquitectura en segon pla:
docker-compose up -d

Un cop finalitzat el procés, ja pots obrir el teu navegador i accedir a: http://localhost:8080

---

## 🌐 Producció i Desplegament
L'aplicació web està publicada i completament operativa a la següent adreça oficial del centre:

🔗 http://grup4.daw.inspedralbes.cat
---

## 📊 Diagrames i Wireframes

A continuació es detalla la documentació de disseny del projecte:

* 📄 **[Descarregar Diagrama de casos d'ús (PDF)](Diagrames/CASOS_DE_US.pdf)**
* 🗄️ **[Descarregar Diagrama del model E-R (PDF)](Diagrames/model_er.pdf)**
