<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220725141237 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE temoignages (id INT AUTO_INCREMENT NOT NULL, num_declaration_id INT NOT NULL, cin_ou_num_passeport VARCHAR(30) NOT NULL, nom_complet VARCHAR(100) NOT NULL, type_temoignage VARCHAR(40) NOT NULL, INDEX IDX_840C8612F224FE7E (num_declaration_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE temoignages ADD CONSTRAINT FK_840C8612F224FE7E FOREIGN KEY (num_declaration_id) REFERENCES reclamations (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE temoignages');
    }
}
