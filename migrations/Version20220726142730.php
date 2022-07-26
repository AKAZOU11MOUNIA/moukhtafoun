<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220726142730 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reclamations ADD num_declaration_id INT NOT NULL');
        $this->addSql('ALTER TABLE reclamations ADD CONSTRAINT FK_1CAD6B76F224FE7E FOREIGN KEY (num_declaration_id) REFERENCES declarants (id)');
        $this->addSql('CREATE INDEX IDX_1CAD6B76F224FE7E ON reclamations (num_declaration_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reclamations DROP FOREIGN KEY FK_1CAD6B76F224FE7E');
        $this->addSql('DROP INDEX IDX_1CAD6B76F224FE7E ON reclamations');
        $this->addSql('ALTER TABLE reclamations DROP num_declaration_id');
    }
}
