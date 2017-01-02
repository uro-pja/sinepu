<?php
namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170102201828 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql',
            'Migration can only be executed safely on \'mysql\'.');
        $this->addSql('CREATE TABLE TicketEvent (uuid CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', ticket CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', type INT NOT NULL, content LONGTEXT NOT NULL, createdAt DATETIME NOT NULL, files LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', INDEX IDX_130DCF5797A0ADA3 (ticket), PRIMARY KEY(uuid)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ticketsTemplate (uuid CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, content VARCHAR(255) NOT NULL, annotations VARCHAR(255) NOT NULL, PRIMARY KEY(uuid)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE TicketEvent ADD CONSTRAINT FK_130DCF5797A0ADA3 FOREIGN KEY (ticket) REFERENCES ticket (uuid)');
        $this->addSql('ALTER TABLE ticket DROP content, DROP files, DROP updatedAt');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql',
            'Migration can only be executed safely on \'mysql\'.');
        $this->addSql('DROP TABLE TicketEvent');
        $this->addSql('DROP TABLE ticketsTemplate');
        $this->addSql('ALTER TABLE ticket ADD content LONGTEXT NOT NULL COLLATE utf8_unicode_ci, ADD files LONGTEXT DEFAULT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:array)\', ADD updatedAt DATETIME DEFAULT NULL');
    }
}
