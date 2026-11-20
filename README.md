# Komfortkasse API v1: Beispiel in PHP (veraltet)

Dieses Repository enthält das PHP-Beispiel für die Komfortkasse API v1 und ist veraltet, denn die API v1 wird nicht mehr weiterentwickelt; für neue Anbindungen nutzen Sie die API v2 mit dem Beispiel [komfortkasse-apiv2-php](https://github.com/ltckomfortkasse/komfortkasse-apiv2-php). Komfortkasse ordnet eingehende Überweisungen automatisch den offenen Bestellungen Ihres Shops zu und meldet den Zahlungsstatus zurück.

[Komfortkasse API](https://komfortkasse.eu/shopsysteme/api/) · [API-Dokumentation (v2)](https://apidoc.komfortkasse.eu/) · [Kostenlos registrieren](https://ssl.komfortkasse.eu/public/register.jsf) · [Hilfe & Dokumentation](https://komfortkasse.freshdesk.com/support/solutions/14000075022)

## Was das Beispiel in diesem Repository tut

Bei der API v1 arbeitet Komfortkasse wie mit den Plugins für fertige Shopsysteme: Ihr System meldet neue Bestellungen an Komfortkasse, und Komfortkasse ruft ein Skript auf Ihrem Server auf, um offene Bestellungen auszulesen und den Zahlungsstatus zu melden.

- `komfortkasse_send.php` meldet eine Beispielbestellung per HTTPS an `ssl.komfortkasse.eu`, mit Prüfung des Zertifikats und ohne Weiterleitungen.
- `komfortkasse_receive.php` beantwortet die Aufrufe von Komfortkasse: Bestellnummern und Bestelldaten auslesen (`readorders`) und Zahlungsstatus empfangen (`updateorders`, geschrieben in `received_updates.txt`). Das Skript antwortet nur, wenn Komfortkasse den richtigen Zugriffscode mitsendet.
- In `komfortkasse_settings.php` tragen Sie den API-Key und den MD5-Hash des Zugriffscodes ein. Beide Werte gehören nicht in ein öffentliches Repository.

## Andere Shopsysteme

Komfortkasse gibt es unter anderem für Shopify, Shopware, WooCommerce, PrestaShop, Gambio und xt:Commerce. Alle Systeme stehen in der [Übersicht der Shopsysteme](https://komfortkasse.eu/shopsysteme/), weitere Plugin-Repositories unter [github.com/ltckomfortkasse](https://github.com/ltckomfortkasse).

## English

**Komfortkasse API v1: PHP example (legacy).** The API v1 is outdated; for new integrations use the API v2 and its example [komfortkasse-apiv2-php](https://github.com/ltckomfortkasse/komfortkasse-apiv2-php). Komfortkasse automatically matches incoming bank transfers to open orders in your shop and reports the payment status back. More information: [Komfortkasse API](https://komfortkasse.eu/shopsysteme/api/) · [API documentation](https://apidoc.komfortkasse.eu/)
