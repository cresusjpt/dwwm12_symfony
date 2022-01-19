<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220118171529 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, family VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, customer_id INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', state TINYINT(1) NOT NULL, INDEX IDX_6EEAA67D9395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE customer (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, cp VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE detail_commande (id INT AUTO_INCREMENT NOT NULL, product_buy_id INT NOT NULL, in_order_id INT NOT NULL, qty_buy INT NOT NULL, total DOUBLE PRECISION NOT NULL, INDEX IDX_98344FA62887D2DD (product_buy_id), INDEX IDX_98344FA6CA661164 (in_order_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE payment (id INT AUTO_INCREMENT NOT NULL, paid_id INT DEFAULT NULL, amount DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', state TINYINT(1) NOT NULL, INDEX IDX_6D28840DBCABAE0 (paid_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, appartenir_id INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, size VARCHAR(255) NOT NULL, color VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, amount DOUBLE PRECISION NOT NULL, qty_stck DOUBLE PRECISION NOT NULL, INDEX IDX_D34A04ADE977E148 (appartenir_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D9395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE detail_commande ADD CONSTRAINT FK_98344FA62887D2DD FOREIGN KEY (product_buy_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE detail_commande ADD CONSTRAINT FK_98344FA6CA661164 FOREIGN KEY (in_order_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840DBCABAE0 FOREIGN KEY (paid_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADE977E148 FOREIGN KEY (appartenir_id) REFERENCES category (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADE977E148');
        $this->addSql('ALTER TABLE detail_commande DROP FOREIGN KEY FK_98344FA6CA661164');
        $this->addSql('ALTER TABLE payment DROP FOREIGN KEY FK_6D28840DBCABAE0');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D9395C3F3');
        $this->addSql('ALTER TABLE detail_commande DROP FOREIGN KEY FK_98344FA62887D2DD');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE customer');
        $this->addSql('DROP TABLE detail_commande');
        $this->addSql('DROP TABLE payment');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE user');
    }
}
