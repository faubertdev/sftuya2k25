<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250305173253 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD identity_id INT DEFAULT NULL, ADD contact_id INT DEFAULT NULL, ADD adresse_id INT DEFAULT NULL, ADD bankinfos_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649FF3ED4A8 FOREIGN KEY (identity_id) REFERENCES identity (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649E7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6494DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649E96C519 FOREIGN KEY (bankinfos_id) REFERENCES bank_infos (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649FF3ED4A8 ON user (identity_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7A1254A ON user (contact_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D6494DE7DC5C ON user (adresse_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E96C519 ON user (bankinfos_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649FF3ED4A8');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649E7A1254A');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6494DE7DC5C');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649E96C519');
        $this->addSql('DROP INDEX UNIQ_8D93D649FF3ED4A8 ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D649E7A1254A ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D6494DE7DC5C ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D649E96C519 ON user');
        $this->addSql('ALTER TABLE user DROP identity_id, DROP contact_id, DROP adresse_id, DROP bankinfos_id');
    }
}
