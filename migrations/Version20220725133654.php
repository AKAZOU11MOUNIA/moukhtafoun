<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220725133654 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE declarants (id INT AUTO_INCREMENT NOT NULL, cin_ou_num_passeport VARCHAR(30) NOT NULL, nom_complet VARCHAR(100) NOT NULL, type_declaration VARCHAR(30) NOT NULL, ville_actuelle VARCHAR(100) NOT NULL, num_telephone VARCHAR(20) NOT NULL, adresse VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reclamations ADD declarants_id INT NOT NULL');
        $this->addSql('ALTER TABLE reclamations ADD CONSTRAINT FK_1CAD6B7625A886BB FOREIGN KEY (declarants_id) REFERENCES declarants (id)');
        $this->addSql('CREATE INDEX IDX_1CAD6B7625A886BB ON reclamations (declarants_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reclamations DROP FOREIGN KEY FK_1CAD6B7625A886BB');
        $this->addSql('DROP TABLE declarants');
        $this->addSql('DROP INDEX IDX_1CAD6B7625A886BB ON reclamations');
        $this->addSql('ALTER TABLE reclamations DROP declarants_id');
    }
}
