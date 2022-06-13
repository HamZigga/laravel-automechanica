<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StatementRequest;
use App\Models\Statement;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class StatementCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class StatementCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Statement::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/statement');
        CRUD::setEntityNameStrings('заказ', 'заказы');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {   
        CRUD::column('id');
        CRUD::column('user_id');
        CRUD::column('summ')->label('Сумма заказа');
        CRUD::column('name')->label('Имя заказчика');
        CRUD::column('surname')->label('Фамилия заказчика');
        CRUD::column('phone')->label('Телефон');
        CRUD::column('email');
        CRUD::column('purchase');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(StatementRequest::class);

        CRUD::field('user_id');
        CRUD::field('summ');
        CRUD::field('name');
        CRUD::field('surname');
        CRUD::field('phone');
        CRUD::field('email');

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        // by default the Show operation will try to show all columns in the db table,
        // but we can easily take over, and have full control of what columns are shown,
        // by changing this config for the Show operation 
        $this->crud->set('show.setFromDb', false);
        CRUD::column('id');
        CRUD::column('user_id');
        CRUD::column('summ')->label('Сумма заказа');
        CRUD::column('name')->label('Имя заказчика');
        CRUD::column('surname')->label('Фамилия заказчика');
        CRUD::column('phone')->label('Телефон');
        CRUD::column('email');
        $statement = Statement::findOrFail($this->crud->getCurrentEntry()->id);
        foreach($statement->purchase as $purchase){
            CRUD::column("ID: ".strval($purchase->product->id).", Наименование: ".strval($purchase->product->title).", ".strval($purchase->quantity)." шт");
            
        }

    }
}
