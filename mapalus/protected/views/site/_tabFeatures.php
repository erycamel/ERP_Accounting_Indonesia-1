<style>
#ticker {
	height: 240px;
	overflow: hidden;

}
#ticker li {
	height: 40px;
}
</style>

<div class="page-header">
	<h2>List of Features</h2>
</div>

<ul id="ticker">
	<li>
	Photo Gallery
	<br/>
	Photo Gallery for show Photo
	</li>
	<li>Company News</li>
	<li>MailBox</li>
	<li>Personal Folder</li>
	<li>Public Folder</li>
	<li>System Folder</li>
	<li>RBAC</li>
	<li>Backup</li>
	<li>Web Services</li>
	<li>Bootstrap Twitter CSS Layout</li>
	<li>Internationalization</li>
	<li>Calendar</li>
	<li>Twitter Info</li>
	<li>Flick Photo</li>
	<li>Indonesian Format Number</li>
	<li>Asset Management</li>
	<li>Person Module</li>
	<li>Leave</li>
	<li>Recruitment</li>
	<li>Accounting</li>
	<li>Purchasing Order</li>
	<li>Account Payable</li>
	<li>Inventory</li>
	<li>Sales Order</li>
	<li>Account Receivable</li>
	<li>Profit/Lost</li>
	<li>Balance Sheet</li>
	
	
</ul>

<script>

	function tick(){
		$('#ticker li:first').slideUp( function () { $(this).appendTo($('#ticker')).slideDown(); });
	}
	setInterval(function(){ tick () }, 4000);


</script>
