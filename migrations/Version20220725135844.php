<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220725135844 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE objets (id INT AUTO_INCREMENT NOT NULL, option_objet VARCHAR(40) NOT NULL, objet VARCHAR(150) NOT NULL, lieu_et_ville_de_disparition VARCHAR(255) NOT NULL, description_objet VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reclamations ADD objets_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reclamations ADD CONSTRAINT FK_1CAD6B766C3A2500 FOREIGN KEY (objets_id) REFERENCES objets (id)');
        $this->addSql('CREATE INDEX IDX_1CAD6B766C3A2500 ON reclamations (objets_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reclamations DROP FOREIGN KEY FK_1CAD6B766C3A2500');
        $this->addSql('DROP TABLE objets');
        $this->addSql('DROP INDEX IDX_1CAD6B766C3A2500 ON reclamations');
        $this->addSql('ALTER TABLE reclamations DROP objets_id');
    }
}
