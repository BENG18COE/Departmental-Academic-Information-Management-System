<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class StudentAlocLost extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
         $table = $this->table('studentalloclist');
        $table->addColumn('teacherid', 'integer')
              ->addColumn('type', 'string',['default'=>0])
              ->addColumn('studentid', 'integer',['default'=>0])
              ->addColumn('sems', 'string',['default'=>0])
              ->addColumn('acyear', 'string',['default'=>0])
              ->create();
    }
}






