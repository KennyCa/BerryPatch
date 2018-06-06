<?php
    require_once 'braintree-php-3.29.0/lib/Braintree.php';

	session_start();
	$gateway = $_SESSION['gateway'];
	
    if (isset($_GET["id"])) {
        $transaction = $gateway->transaction()->find($_GET["id"]);
        $transactionSuccessStatuses = [
            Braintree\Transaction::AUTHORIZED,
            Braintree\Transaction::AUTHORIZING,
            Braintree\Transaction::SETTLED,
            Braintree\Transaction::SETTLING,
            Braintree\Transaction::SETTLEMENT_CONFIRMED,
            Braintree\Transaction::SETTLEMENT_PENDING,
            Braintree\Transaction::SUBMITTED_FOR_SETTLEMENT
        ];
        if (in_array($transaction->status, $transactionSuccessStatuses)) {
            $header = "Success!";
            $icon = "success";
            $message = "Your transaction has been successfully processed.";
        } else {
            $header = "Transaction Failed";
            $icon = "fail";
            $message = "Your transaction has a status of " . $transaction->status;
        }
		//echo '<pre>'; print_r($gateway); echo '</pre>';
		//echo '<pre>'; print_r($transaction); echo '</pre>';
    }
?>

<html>
<head>
<?php require ("library/head.php"); ?>
<title>Transaction Page</title>
<?php require('library/favicon.php'); ?>
</head>
<body>
<header>

</header>
<content>

</content>
<footer>

</footer>
</body>
</html>

<div class="wrapper">
    <div class="response container">
        <div class="content">
            <div class="icon">
            <img src="/images/<?php echo($icon)?>.svg" alt="">
            </div>

            <h1><?php echo($header)?></h1>
            <section>
                <p><?php echo($message)?></p>
            </section>
            
        </div>
    </div>
</div>

<aside class="drawer dark">
    <header>
        <div class="content compact">
            <h3>API Response</h3>
        </div>
    </header>

    <article class="content compact">
        <section>
            <h5>Transaction</h5>
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>id</td>
                        <td><?php echo($transaction->id)?></td>
                    </tr>
                    <tr>
                        <td>type</td>
                        <td><?php echo($transaction->type)?></td>
                    </tr>
                    <tr>
                        <td>amount</td>
                        <td><?php echo($transaction->amount)?></td>
                    </tr>
                    <tr>
                        <td>status</td>
                        <td><?php echo($transaction->status)?></td>
                    </tr>
                    <tr>
                        <td>created_at</td>
                        <td><?php echo($transaction->createdAt->format('Y-m-d H:i:s'))?></td>
                    </tr>
                    <tr>
                        <td>updated_at</td>
                        <td><?php echo($transaction->updatedAt->format('Y-m-d H:i:s'))?></td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section>
            <h5>Payment</h5>

            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>token</td>
                        <td><?php echo($transaction->creditCardDetails->token)?></td>
                    </tr>
                    <tr>
                        <td>bin</td>
                        <td><?php echo($transaction->creditCardDetails->bin)?></td>
                    </tr>
                    <tr>
                        <td>last_4</td>
                        <td><?php echo($transaction->creditCardDetails->last4)?></td>
                    </tr>
                    <tr>
                        <td>card_type</td>
                        <td><?php echo($transaction->creditCardDetails->cardType)?></td>
                    </tr>
                    <tr>
                        <td>expiration_date</td>
                        <td><?php echo($transaction->creditCardDetails->expirationDate)?></td>
                    </tr>
                    <tr>
                        <td>cardholder_name</td>
                        <td><?php echo($transaction->creditCardDetails->cardholderName)?></td>
                    </tr>
                    <tr>
                        <td>customer_location</td>
                        <td><?php echo($transaction->creditCardDetails->customerLocation)?></td>
                    </tr>
                </tbody>
            </table>
        </section>

        <?php if (!is_null($transaction->customerDetails->id)) : ?>
        <section>
            <h5>Customer Details</h5>
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>id</td>
                        <td><?php echo($transaction->customerDetails->id)?></td>
                    </tr>
                    <tr>
                        <td>first_name</td>
                        <td><?php echo($transaction->customerDetails->firstName)?></td>
                    </tr>
                    <tr>
                        <td>last_name</td>
                        <td><?php echo($transaction->customerDetails->lastName)?></td>
                    </tr>
                    <tr>
                        <td>email</td>
                        <td><?php echo($transaction->customerDetails->email)?></td>
                    </tr>
                    <tr>
                        <td>company</td>
                        <td><?php echo($transaction->customerDetails->company)?></td>
                    </tr>
                    <tr>
                        <td>website</td>
                        <td><?php echo($transaction->customerDetails->website)?></td>
                    </tr>
                    <tr>
                        <td>phone</td>
                        <td><?php echo($transaction->customerDetails->phone)?></td>
                    </tr>
                    <tr>
                        <td>fax</td>
                        <td><?php echo($transaction->customerDetails->fax)?></td>
                    </tr>
                </tbody>
            </table>
        </section>i
        <?php endif; ?>

        <section>
            <p class="center small">Integrate with the Braintree SDK for a secure and seamless checkout</p>
        </section>

        <section>
            <a class="button secondary full" href="https://developers.braintreepayments.com/guides/drop-in" target="_blank">
                <span>See the Docs</span>
            </a><br>
			<a href="https://developers.braintreepayments.com" class="braintree" target="_blank">Braintree</a>
			<br>
			<a href="index.php">HOME</a>
        </section>
    </article>
</aside>


</body>
</html>