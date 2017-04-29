<li class="{{ Request::is('customers*') ? 'active' : '' }}">
    <a href="{!! route('customers.index') !!}"><i class="fa fa-edit"></i><span>Customers</span></a>
</li>
<li class="{{ Request::is('samples*') ? 'active' : '' }}">
    <a href="{!! route('samples.index') !!}"><i class="fa fa-edit"></i><span>Samples</span></a>
</li>
<li class="{{ Request::is('products*') ? 'active' : '' }}">
    <a href="{!! route('products.index') !!}"><i class="fa fa-edit"></i><span>Products</span></a>
</li>
<li class="{{ Request::is('equipment*') ? 'active' : '' }}">
    <a href="{!! route('equipment.index') !!}"><i class="fa fa-edit"></i><span>Equipment</span></a>
</li>

