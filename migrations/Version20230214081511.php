<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230214081511 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE livraison (id INT AUTO_INCREMENT NOT NULL, fk_restaurant_id INT DEFAULT NULL, fk_suivi_commande_id INT DEFAULT NULL, fk_user_id INT DEFAULT NULL, date DATETIME NOT NULL, secteur VARCHAR(255) NOT NULL, INDEX IDX_A60C9F1FD5AD05AC (fk_restaurant_id), INDEX IDX_A60C9F1F9DCCA4B1 (fk_suivi_commande_id), INDEX IDX_A60C9F1F5741EEB9 (fk_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plat (id INT AUTO_INCREMENT NOT NULL, fk_type_plat_id INT NOT NULL, fk_restaurant_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, tarif DOUBLE PRECISION NOT NULL, stock INT DEFAULT NULL, INDEX IDX_2038A207DEC1D88C (fk_type_plat_id), INDEX IDX_2038A207D5AD05AC (fk_restaurant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restaurant (id INT AUTO_INCREMENT NOT NULL, fk_user_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, INDEX IDX_EB95123F5741EEB9 (fk_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE suivie_de_commande (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE typeplat (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE typevehicule (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, telephone VARCHAR(10) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1FD5AD05AC FOREIGN KEY (fk_restaurant_id) REFERENCES restaurant (id)');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1F9DCCA4B1 FOREIGN KEY (fk_suivi_commande_id) REFERENCES suivie_de_commande (id)');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1F5741EEB9 FOREIGN KEY (fk_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE plat ADD CONSTRAINT FK_2038A207DEC1D88C FOREIGN KEY (fk_type_plat_id) REFERENCES typeplat (id)');
        $this->addSql('ALTER TABLE plat ADD CONSTRAINT FK_2038A207D5AD05AC FOREIGN KEY (fk_restaurant_id) REFERENCES restaurant (id)');
        $this->addSql('ALTER TABLE restaurant ADD CONSTRAINT FK_EB95123F5741EEB9 FOREIGN KEY (fk_user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1FD5AD05AC');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1F9DCCA4B1');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1F5741EEB9');
        $this->addSql('ALTER TABLE plat DROP FOREIGN KEY FK_2038A207DEC1D88C');
        $this->addSql('ALTER TABLE plat DROP FOREIGN KEY FK_2038A207D5AD05AC');
        $this->addSql('ALTER TABLE restaurant DROP FOREIGN KEY FK_EB95123F5741EEB9');
        $this->addSql('DROP TABLE livraison');
        $this->addSql('DROP TABLE plat');
        $this->addSql('DROP TABLE restaurant');
        $this->addSql('DROP TABLE suivie_de_commande');
        $this->addSql('DROP TABLE typeplat');
        $this->addSql('DROP TABLE typevehicule');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
