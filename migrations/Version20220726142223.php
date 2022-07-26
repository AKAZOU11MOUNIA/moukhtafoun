<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220726142223 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reclamations DROP FOREIGN KEY FK_1CAD6B7625A886BB');
        $this->addSql('DROP INDEX IDX_1CAD6B7625A886BB ON reclamations');
        $this->addSql('ALTER TABLE reclamations DROP declarants_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reclamations ADD declarants_id INT NOT NULL');
        $this->addSql('ALTER TABLE reclamations ADD CONSTRAINT FK_1CAD6B7625A886BB FOREIGN KEY (declarants_id) REFERENCES declarants (id)');
        $this->addSql('CREATE INDEX IDX_1CAD6B7625A886BB ON reclamations (declarants_id)');
    }
}
