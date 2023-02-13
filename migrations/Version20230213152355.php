<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230213152355 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plat ADD fk_restaurant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE plat ADD CONSTRAINT FK_2038A207D5AD05AC FOREIGN KEY (fk_restaurant_id) REFERENCES restaurant (id)');
        $this->addSql('CREATE INDEX IDX_2038A207D5AD05AC ON plat (fk_restaurant_id)');
        $this->addSql('ALTER TABLE restaurant DROP FOREIGN KEY FK_EB95123F2712884C');
        $this->addSql('DROP INDEX IDX_EB95123F2712884C ON restaurant');
        $this->addSql('ALTER TABLE restaurant DROP fk_plat_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plat DROP FOREIGN KEY FK_2038A207D5AD05AC');
        $this->addSql('DROP INDEX IDX_2038A207D5AD05AC ON plat');
        $this->addSql('ALTER TABLE plat DROP fk_restaurant_id');
        $this->addSql('ALTER TABLE restaurant ADD fk_plat_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE restaurant ADD CONSTRAINT FK_EB95123F2712884C FOREIGN KEY (fk_plat_id) REFERENCES plat (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_EB95123F2712884C ON restaurant (fk_plat_id)');
    }
}
