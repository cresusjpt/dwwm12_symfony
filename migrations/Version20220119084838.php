<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220119084838 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, famille VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, codepostal INT NOT NULL, ville LONGTEXT DEFAULT NULL, adresse LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, c_lient_id INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', etat TINYINT(1) NOT NULL, INDEX IDX_6EEAA67DEEBD994C (c_lient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE detail (id INT AUTO_INCREMENT NOT NULL, detail_produit_id INT NOT NULL, detail_commande_id INT NOT NULL, qte INT NOT NULL, INDEX IDX_2E067F93B42ECE2D (detail_produit_id), INDEX IDX_2E067F93EDE14305 (detail_commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paiement (id INT AUTO_INCREMENT NOT NULL, paid_id INT NOT NULL, montant DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', etat TINYINT(1) NOT NULL, INDEX IDX_B1DC7A1EBCABAE0 (paid_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, appartenir_id INT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, taille VARCHAR(255) NOT NULL, color VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, prix DOUBLE PRECISION NOT NULL, qte_stock INT NOT NULL, INDEX IDX_29A5EC27E977E148 (appartenir_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DEEBD994C FOREIGN KEY (c_lient_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE detail ADD CONSTRAINT FK_2E067F93B42ECE2D FOREIGN KEY (detail_produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE detail ADD CONSTRAINT FK_2E067F93EDE14305 FOREIGN KEY (detail_commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE paiement ADD CONSTRAINT FK_B1DC7A1EBCABAE0 FOREIGN KEY (paid_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27E977E148 FOREIGN KEY (appartenir_id) REFERENCES categorie (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27E977E148');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DEEBD994C');
        $this->addSql('ALTER TABLE detail DROP FOREIGN KEY FK_2E067F93EDE14305');
        $this->addSql('ALTER TABLE paiement DROP FOREIGN KEY FK_B1DC7A1EBCABAE0');
        $this->addSql('ALTER TABLE detail DROP FOREIGN KEY FK_2E067F93B42ECE2D');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE detail');
        $this->addSql('DROP TABLE paiement');
        $this->addSql('DROP TABLE produit');
    }
}
