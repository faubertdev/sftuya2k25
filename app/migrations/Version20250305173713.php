<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250305173713 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE local_product ADD studio_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE local_product ADD CONSTRAINT FK_4E9F0120446F285F FOREIGN KEY (studio_id) REFERENCES studio (id)');
        $this->addSql('CREATE INDEX IDX_4E9F0120446F285F ON local_product (studio_id)');
        $this->addSql('ALTER TABLE studio ADD adresse_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE studio ADD CONSTRAINT FK_4A2B07B64DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4A2B07B64DE7DC5C ON studio (adresse_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE studio DROP FOREIGN KEY FK_4A2B07B64DE7DC5C');
        $this->addSql('DROP INDEX UNIQ_4A2B07B64DE7DC5C ON studio');
        $this->addSql('ALTER TABLE studio DROP adresse_id');
        $this->addSql('ALTER TABLE local_product DROP FOREIGN KEY FK_4E9F0120446F285F');
        $this->addSql('DROP INDEX IDX_4E9F0120446F285F ON local_product');
        $this->addSql('ALTER TABLE local_product DROP studio_id');
    }
}
