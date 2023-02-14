<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230214105633 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE secteurlivraison (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE restaurant ADD fk_secteur_livraison_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE restaurant ADD CONSTRAINT FK_EB95123F209AC84B FOREIGN KEY (fk_secteur_livraison_id) REFERENCES secteurlivraison (id)');
        $this->addSql('CREATE INDEX IDX_EB95123F209AC84B ON restaurant (fk_secteur_livraison_id)');
        $this->addSql('ALTER TABLE user ADD fk_type_vehicule_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649573985F7 FOREIGN KEY (fk_type_vehicule_id) REFERENCES typevehicule (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649573985F7 ON user (fk_type_vehicule_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE restaurant DROP FOREIGN KEY FK_EB95123F209AC84B');
        $this->addSql('DROP TABLE secteurlivraison');
        $this->addSql('DROP INDEX IDX_EB95123F209AC84B ON restaurant');
        $this->addSql('ALTER TABLE restaurant DROP fk_secteur_livraison_id');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649573985F7');
        $this->addSql('DROP INDEX IDX_8D93D649573985F7 ON user');
        $this->addSql('ALTER TABLE user DROP fk_type_vehicule_id');
    }
}
