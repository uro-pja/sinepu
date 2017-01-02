<?php
namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170102204124 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql',
            'Migration can only be executed safely on \'mysql\'.');
        $this->addSql('ALTER TABLE TicketEvent DROP FOREIGN KEY FK_130DCF5797A0ADA3');
        $this->addSql('DROP INDEX IDX_130DCF5797A0ADA3 ON TicketEvent');
        $this->addSql('ALTER TABLE TicketEvent CHANGE ticket ticket_uuid CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE TicketEvent ADD CONSTRAINT FK_130DCF57E3A4459E FOREIGN KEY (ticket_uuid) REFERENCES ticket (uuid)');
        $this->addSql('CREATE INDEX IDX_130DCF57E3A4459E ON TicketEvent (ticket_uuid)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql',
            'Migration can only be executed safely on \'mysql\'.');
        $this->addSql('ALTER TABLE TicketEvent DROP FOREIGN KEY FK_130DCF57E3A4459E');
        $this->addSql('DROP INDEX IDX_130DCF57E3A4459E ON TicketEvent');
        $this->addSql('ALTER TABLE TicketEvent CHANGE ticket_uuid ticket CHAR(36) DEFAULT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE TicketEvent ADD CONSTRAINT FK_130DCF5797A0ADA3 FOREIGN KEY (ticket) REFERENCES ticket (uuid)');
        $this->addSql('CREATE INDEX IDX_130DCF5797A0ADA3 ON TicketEvent (ticket)');
    }
}
