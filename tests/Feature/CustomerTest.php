<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\CustomerStatus;
use App\Customer;
use App\Http\Controllers\CustomerController;
use App\Order;

class CustomerTest extends TestCase
{
    use WithFaker;

    public function test_apicall()
    {
        $response = $this->get('/api/customers');

        $response->assertStatus(200);  
    }

    public function test_webcall()
    {

        $response = $this->get('/customers');

        $response->assertStatus(200);  
    }

    public function test_customertype_red()
    {
        $customerStatusRemoved = CustomerStatus::where('Code','=','RE')->first();
        $customer = new Customer;
        $customer->CustomerId = $this->faker->uuid;
        $customer->CustomerStatusId = $customerStatusRemoved->CustomerStatusId;
        $customer->Name = $this->faker->name;
        $customer->CreatedDateTime = now();
        $customer->save();
        
        $findCustomer = Customer::where('CustomerId','=',$customer->CustomerId)->first();
        $this->assertSame('Red', $findCustomer->CustomerType);

        $customer->delete();
    }

    public function test_customertype_orange_with_no_order()
    {
        $customerStatusActive = CustomerStatus::where('Code','=','AC')->first();
        $customer = new Customer;
        $customer->CustomerId = $this->faker->uuid;
        $customer->CustomerStatusId = $customerStatusActive->CustomerStatusId;
        $customer->Name = $this->faker->name;
        $customer->CreatedDateTime = date('Y-m-d', strtotime('-15 months'));;
        $customer->save();
        
        $findCustomer = Customer::where('CustomerId','=',$customer->CustomerId)->first();
        $this->assertSame('Orange', $findCustomer->CustomerType);

        $customer->delete();
    }

    public function test_customertype_blank_with_no_order()
    {
        $customerStatusActive = CustomerStatus::where('Code','=','AC')->first();
        $customer = new Customer;
        $customer->CustomerId = $this->faker->uuid;
        $customer->CustomerStatusId = $customerStatusActive->CustomerStatusId;
        $customer->Name = $this->faker->name;
        $customer->CreatedDateTime = date('Y-m-d', strtotime('-10 months'));;
        $customer->save();
        
        $findCustomer = Customer::where('CustomerId','=',$customer->CustomerId)->first();
        $this->assertSame('', $findCustomer->CustomerType);

        $customer->delete();
    }

    public function test_customertype_orange_with_order()
    {
        $customerStatusActive = CustomerStatus::where('Code','=','AC')->first();
        $customer = new Customer;
        $customer->CustomerId = $this->faker->uuid;
        $customer->CustomerStatusId = $customerStatusActive->CustomerStatusId;
        $customer->Name = $this->faker->name;
        $customer->CreatedDateTime = date('Y-m-d', strtotime('-15 months'));;
        $customer->save();
        
        $order = new Order;
        $order->OrderId = $this->faker->uuid;
        $order->CustomerId = $customer->CustomerId;
        $order->OrderStatus = 'Completed';
        $order->OrderTotal = 100;
        $order->CreatedDateTime = date('Y-m-d', strtotime('13 months'));
        $order->save();

        $findCustomer = Customer::where('CustomerId','=',$customer->CustomerId)->first();
        $this->assertSame('Orange', $findCustomer->CustomerType);

        $order->delete();
        $customer->delete();
    }

    public function test_customertype_blank_with_order()
    {
        $customerStatusActive = CustomerStatus::where('Code','=','AC')->first();
        $customer = new Customer;
        $customer->CustomerId = $this->faker->uuid;
        $customer->CustomerStatusId = $customerStatusActive->CustomerStatusId;
        $customer->Name = $this->faker->name;
        $customer->CreatedDateTime = date('Y-m-d', strtotime('-15 months'));;
        $customer->save();
        
        $order = new Order;
        $order->OrderId = $this->faker->uuid;
        $order->CustomerId = $customer->CustomerId;
        $order->OrderStatus = 'Completed';
        $order->OrderTotal = 100;
        $order->CreatedDateTime = date('Y-m-d', strtotime('5 months'));
        $order->save();

        $findCustomer = Customer::where('CustomerId','=',$customer->CustomerId)->first();
        $this->assertSame('', $findCustomer->CustomerType);

        $order->delete();
        $customer->delete();
    }

    public function test_customertype_green()
    {
        $customerStatusActive = CustomerStatus::where('Code','=','AC')->first();
        $customer = new Customer;
        $customer->CustomerId = $this->faker->uuid;
        $customer->CustomerStatusId = $customerStatusActive->CustomerStatusId;
        $customer->Name = $this->faker->name;
        $customer->CreatedDateTime = date('Y-m-d', strtotime('-15 months'));;
        $customer->save();
        
        $order = new Order;
        $order->OrderId = $this->faker->uuid;
        $order->CustomerId = $customer->CustomerId;
        $order->OrderStatus = 'Completed';
        $order->OrderTotal = 120;
        $order->CreatedDateTime = date('Y-m-d', strtotime('2 months'));
        $order->save();

        $order_second = new Order;
        $order_second->OrderId = $this->faker->uuid;
        $order_second->CustomerId = $customer->CustomerId;
        $order_second->OrderStatus = 'Completed';
        $order_second->OrderTotal = 120;
        $order_second->CreatedDateTime = date('Y-m-d', strtotime('1 months'));
        $order_second->save();

        $findCustomer = Customer::where('CustomerId','=',$customer->CustomerId)->first();
        $this->assertSame('Green', $findCustomer->CustomerType);

        $order_second->delete();
        $order->delete();
        $customer->delete();
    }

    public function test_customertype_blank_green_onlyCompleted()
    {
        $customerStatusActive = CustomerStatus::where('Code','=','AC')->first();
        $customer = new Customer;
        $customer->CustomerId = $this->faker->uuid;
        $customer->CustomerStatusId = $customerStatusActive->CustomerStatusId;
        $customer->Name = $this->faker->name;
        $customer->CreatedDateTime = date('Y-m-d', strtotime('-15 months'));;
        $customer->save();
        
        $order = new Order;
        $order->OrderId = $this->faker->uuid;
        $order->CustomerId = $customer->CustomerId;
        $order->OrderStatus = 'Completed';
        $order->OrderTotal = 120;
        $order->CreatedDateTime = date('Y-m-d', strtotime('2 months'));
        $order->save();

        $order_second = new Order;
        $order_second->OrderId = $this->faker->uuid;
        $order_second->CustomerId = $customer->CustomerId;
        $order_second->OrderStatus = 'Pending';
        $order_second->OrderTotal = 120;
        $order_second->CreatedDateTime = date('Y-m-d', strtotime('1 months'));
        $order_second->save();

        $order_thired = new Order;
        $order_thired->OrderId = $this->faker->uuid;
        $order_thired->CustomerId = $customer->CustomerId;
        $order_thired->OrderStatus = 'Completed';
        $order_thired->OrderTotal = 120;
        $order_thired->CreatedDateTime = date('Y-m-d', strtotime('6 months'));
        $order_thired->save();

        $findCustomer = Customer::where('CustomerId','=',$customer->CustomerId)->first();
        $this->assertSame('', $findCustomer->CustomerType);

        $order_thired->delete();
        $order_second->delete();
        $order->delete();
        $customer->delete();
    }

}
