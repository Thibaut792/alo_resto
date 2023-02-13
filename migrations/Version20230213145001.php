<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230213145001 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livraison ADD fk_restaurant_id INT DEFAULT NULL, ADD fk_suivi_commande_id INT DEFAULT NULL, ADD fk_livreur_id INT DEFAULT NULL, ADD fk_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1FD5AD05AC FOREIGN KEY (fk_restaurant_id) REFERENCES restaurant (id)');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1F9DCCA4B1 FOREIGN KEY (fk_suivi_commande_id) REFERENCES suivie_de_commande (id)');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1F80AAD92 FOREIGN KEY (fk_livreur_id) REFERENCES livreur (id)');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1F5741EEB9 FOREIGN KEY (fk_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_A60C9F1FD5AD05AC ON livraison (fk_restaurant_id)');
        $this->addSql('CREATE INDEX IDX_A60C9F1F9DCCA4B1 ON livraison (fk_suivi_commande_id)');
        $this->addSql('CREATE INDEX IDX_A60C9F1F80AAD92 ON livraison (fk_livreur_id)');
        $this->addSql('CREATE INDEX IDX_A60C9F1F5741EEB9 ON livraison (fk_user_id)');
        $this->addSql('ALTER TABLE livreur ADD fk_user_id INT DEFAULT NULL, ADD fk_type_vehicule_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE livreur ADD CONSTRAINT FK_EB7A4E6D5741EEB9 FOREIGN KEY (fk_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE livreur ADD CONSTRAINT FK_EB7A4E6D573985F7 FOREIGN KEY (fk_type_vehicule_id) REFERENCES typevehicule (id)');
        $this->addSql('CREATE INDEX IDX_EB7A4E6D5741EEB9 ON livreur (fk_user_id)');
        $this->addSql('CREATE INDEX IDX_EB7A4E6D573985F7 ON livreur (fk_type_vehicule_id)');
        $this->addSql('ALTER TABLE restaurant ADD fk_plat_id INT DEFAULT NULL, ADD fk_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE restaurant ADD CONSTRAINT FK_EB95123F2712884C FOREIGN KEY (fk_plat_id) REFERENCES plat (id)');
        $this->addSql('ALTER TABLE restaurant ADD CONSTRAINT FK_EB95123F5741EEB9 FOREIGN KEY (fk_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_EB95123F2712884C ON restaurant (fk_plat_id)');
        $this->addSql('CREATE INDEX IDX_EB95123F5741EEB9 ON restaurant (fk_user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1FD5AD05AC');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1F9DCCA4B1');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1F80AAD92');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1F5741EEB9');
        $this->addSql('DROP INDEX IDX_A60C9F1FD5AD05AC ON livraison');
        $this->addSql('DROP INDEX IDX_A60C9F1F9DCCA4B1 ON livraison');
        $this->addSql('DROP INDEX IDX_A60C9F1F80AAD92 ON livraison');
        $this->addSql('DROP INDEX IDX_A60C9F1F5741EEB9 ON livraison');
        $this->addSql('ALTER TABLE livraison DROP fk_restaurant_id, DROP fk_suivi_commande_id, DROP fk_livreur_id, DROP fk_user_id');
        $this->addSql('ALTER TABLE livreur DROP FOREIGN KEY FK_EB7A4E6D5741EEB9');
        $this->addSql('ALTER TABLE livreur DROP FOREIGN KEY FK_EB7A4E6D573985F7');
        $this->addSql('DROP INDEX IDX_EB7A4E6D5741EEB9 ON livreur');
        $this->addSql('DROP INDEX IDX_EB7A4E6D573985F7 ON livreur');
        $this->addSql('ALTER TABLE livreur DROP fk_user_id, DROP fk_type_vehicule_id');
        $this->addSql('ALTER TABLE restaurant DROP FOREIGN KEY FK_EB95123F2712884C');
        $this->addSql('ALTER TABLE restaurant DROP FOREIGN KEY FK_EB95123F5741EEB9');
        $this->addSql('DROP INDEX IDX_EB95123F2712884C ON restaurant');
        $this->addSql('DROP INDEX IDX_EB95123F5741EEB9 ON restaurant');
        $this->addSql('ALTER TABLE restaurant DROP fk_plat_id, DROP fk_user_id');
    }
}
