<?php
    namespace App\Enums;

    enum StatutCommande: string {
        case EnAttente = "En attente";
        case EnPreparation = "En préparation";
        case Prete  = "Prête";
        case Payee = "Payée";
    }
