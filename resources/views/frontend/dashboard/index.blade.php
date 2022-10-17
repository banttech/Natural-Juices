@extends('layouts.frontend.app')
@section('content')
	<section id="dash" class="invoices subPg">
    <div class="contain regular">
        <h1 class="main_heading">My Dashboard</h1>
        <div class="ouTer">
            <div class="inNer lSide">
                <ul class="sBar">
                    <li><a href="dashboard.html"><i class="fa-tachometer-alt"></i>Dashboard</a></li>
                    <li><a href="wishlist.html"><i class="fi-heart"></i>My Wishlist</a></li>
                    <li><a href="notifications.html"><i class="fi-bell"></i>Notifications</a></li>
                    <li class="active"><a href="invoices.html"><i class="fi-text-align-justify"></i>My Invoices</a></li>
                    <li><a href="orders.html"><i class="fi-list"></i>My Orders</a></li>
                    <li><a href="payment-method.html"><i class="fi-credit-card-alt"></i>Payment Method</a></li>
                    <li><a href="profile.html"><i class="fi-user"></i>Profile</a></li>
                    <li><a href="logout.html"><i class="fi-upload"></i>Logout</a></li>
                </ul>
            </div>
            <div class="inNer rSide">
                <div class="tableBlk">
                    <table class="invoiceTbl" width="100%">
                        <tbody><tr>
                            <th>Invoices Id</th>
                            <th>Customer Name</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Details</th>
                        </tr>
                        <tr>
                            <td>214243</td>
                            <td>John Wick</td>
                            <td>$250</td>
                            <td>27/07/17</td>
                            <td>
                                <span class="cmplt">Complete</span>
                            </td>
                            <td>
                                <span class="view">view</span>
                            </td>
                        </tr>
                        <tr>
                            <td>214244</td>
                            <td>Abraham Adam</td>
                            <td>$220</td>
                            <td>27/07/17</td>
                            <td>
                                <span class="pndng">Pending</span>
                            </td>
                            <td>
                                <span class="view">view</span>
                            </td>
                        </tr>
                        <tr>
                            <td>214245</td>
                            <td>Jenifer Kem</td>
                            <td>$150</td>
                            <td>27/07/17</td>
                            <td>
                                <span class="cmplt">Complete</span>
                            </td>
                            <td>
                                <span class="view">view</span>
                            </td>
                        </tr>
                        <tr>
                            <td>214246</td>
                            <td>Samira Jones</td>
                            <td>$140</td>
                            <td>27/07/17</td>
                            <td>
                                <span class="pndng">Pending</span>
                            </td>
                            <td>
                                <span class="view">view</span>
                            </td>
                        </tr>
                        <tr>
                            <td>214247</td>
                            <td>Preety Chen</td>
                            <td>$180</td>
                            <td>27/07/17</td>
                            <td>
                                <span class="pndng">Pending</span>
                            </td>
                            <td>
                                <span class="view">view</span>
                            </td>
                        </tr>
                        <tr>
                            <td>214248</td>
                            <td>Tai Chi</td>
                            <td>$390</td>
                            <td>27/07/17</td>
                            <td>
                                <span class="cmplt">Complete</span>
                            </td>
                            <td>
                                <span class="view">view</span>
                            </td>
                        </tr>
                        <tr>
                            <td>214249</td>
                            <td>Christofer</td>
                            <td>$280</td>
                            <td>27/07/17</td>
                            <td>
                                <span class="cmplt">Complete</span>
                            </td>
                            <td>
                                <span class="view">view</span>
                            </td>
                        </tr>
                         
                        
                      
                     
                       
                    </tbody></table>
                </div>
                <div class="text-center">
                    <ul class="pagination">
                        <li><a href="?">«</a></li>
                        <li><a href="?" class="active">1</a></li>
                        <li><a href="?">2</a></li>
                        <li><a href="?">3</a></li>
                        <li><a href="?">4</a></li>
                        <li><a href="?">5</a></li>
                        <li><a href="?">»</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
	
@endsection
