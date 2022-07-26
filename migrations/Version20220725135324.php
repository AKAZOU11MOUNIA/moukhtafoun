<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220725135324 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE personne_perdue (id INT AUTO_INCREMENT NOT NULL, cin_ou_num_passeport VARCHAR(30) DEFAULT NULL, nom_complet VARCHAR(100) NOT NULL, age VARCHAR(3) NOT NULL, sexe VARCHAR(10) NOT NULL, lien_familiale_avec_declarant VARCHAR(40) NOT NULL, periode_de_disparition VARCHAR(255) NOT NULL COMMENT \'(DC2Type:dateinterval)\', ville_et_lieu_de_disparition VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reclamations ADD personne_perdue_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reclamations ADD CONSTRAINT FK_1CAD6B76C48CE658 FOREIGN KEY (personne_perdue_id) REFERENCES personne_perdue (id)');
        $this->addSql('CREATE INDEX IDX_1CAD6B76C48CE658 ON reclamations (personne_perdue_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reclamations DROP FOREIGN KEY FK_1CAD6B76C48CE658');
        $this->addSql('DROP TABLE personne_perdue');
        $this->addSql('DROP INDEX IDX_1CAD6B76C48CE658 ON reclamations');
        $this->addSql('ALTER TABLE reclamations DROP personne_perdue_id');
    }
}
