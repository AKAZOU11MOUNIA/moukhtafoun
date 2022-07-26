<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220725143634 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE archives (id INT AUTO_INCREMENT NOT NULL, num_declaration_id INT NOT NULL, cin_ou_num_passeport_declarant VARCHAR(30) NOT NULL, nom_complet_declarant VARCHAR(100) NOT NULL, date_debut_enquete DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', date_fin_enquete DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', UNIQUE INDEX UNIQ_E262EC39F224FE7E (num_declaration_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE archives ADD CONSTRAINT FK_E262EC39F224FE7E FOREIGN KEY (num_declaration_id) REFERENCES reclamations (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE archives');
    }
}
