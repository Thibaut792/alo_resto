<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230214081839 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE secteurlivraison (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE restaurant ADD fk_secteurlivraison_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE restaurant ADD CONSTRAINT FK_EB95123FCFB06D33 FOREIGN KEY (fk_secteurlivraison_id) REFERENCES secteurlivraison (id)');
        $this->addSql('CREATE INDEX IDX_EB95123FCFB06D33 ON restaurant (fk_secteurlivraison_id)');
        $this->addSql('ALTER TABLE user ADD fk_typevehicule_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649EDA14779 FOREIGN KEY (fk_typevehicule_id) REFERENCES typevehicule (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649EDA14779 ON user (fk_typevehicule_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE restaurant DROP FOREIGN KEY FK_EB95123FCFB06D33');
        $this->addSql('DROP TABLE secteurlivraison');
        $this->addSql('DROP INDEX IDX_EB95123FCFB06D33 ON restaurant');
        $this->addSql('ALTER TABLE restaurant DROP fk_secteurlivraison_id');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649EDA14779');
        $this->addSql('DROP INDEX IDX_8D93D649EDA14779 ON user');
        $this->addSql('ALTER TABLE user DROP fk_typevehicule_id');
    }
}
