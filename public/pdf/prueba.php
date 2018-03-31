<?php require_once "plantilla/__header.php"; ?>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">SERVICE</th>
            <th class="desc">DESCRIPTION</th>
            <th>PRICE</th>
            <th>QTY</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
        	<?php foreach ($this->data as $row): ?>
        		<tr>
        		  <td class="service">Design</td>
        		  <td class="desc">Creating a recognizable design solution based on the company's existing visual identity</td>
        		  <td class="unit">$40.00</td>
        		  <td class="qty">26</td>
        		  <td class="total">$1,040.00</td>
        		</tr>
        	<?php endforeach ?>
        </tbody>
      </table>

      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">
          A finance charge of 1.5% will be made on unpaid balances after 30 days.
        </div>
      </div>
    </main>
<?php require_once "plantilla/__footer.php"; ?>
  
