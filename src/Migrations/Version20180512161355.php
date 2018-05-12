<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180512161355 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE endereco_eletronico (id INT AUTO_INCREMENT NOT NULL, usuario_id INT NOT NULL, endereco_eletronico VARCHAR(150) NOT NULL, INDEX IDX_C91F5D15DB38439E (usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE endereco_eletronico ADD CONSTRAINT FK_C91F5D15DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('DROP TABLE email');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE email (id INT AUTO_INCREMENT NOT NULL, usuario_id INT NOT NULL, email VARCHAR(150) NOT NULL COLLATE utf8mb4_unicode_ci, INDEX IDX_E7927C74DB38439E (usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE email ADD CONSTRAINT FK_E7927C74DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('DROP TABLE endereco_eletronico');
    }
}
