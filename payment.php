<?php
// require_once("includes/header.php");
include("connection/connect.php");
include_once 'product-action.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // echo "Invalid Request!";
    // exit();
$totalPrice = $_POST['total_price']; // Total price from checkout
$ownerCommissionRate = 0.005; // 0.5% commission for you
$sellerShareRate = 1 - $ownerCommissionRate; // 99.5% for the seller

// Calculate amounts
$commissionAmount = $totalPrice * $ownerCommissionRate; // 0.5% commission
$sellerAmount = $totalPrice * $sellerShareRate; // 99.5% for the seller
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solana Payment</title>

    <style>
    .payment-table {
        width: 50%;
        margin: 20px auto;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
        font-size: 16px;
    }

    .payment-table th, .payment-table td {
        padding: 12px;
        border: 1px solid #ddd;
        text-align: center;
    }

    .payment-table th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    .payment-table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .payment-table tr:hover {
        background-color: #f1f1f1;
    }

    .payment-table td {
        color: #333;
    }

    .payment-table th, .payment-table td {
        padding: 12px 15px;
    }
</style>

    <script src="https://cdn.jsdelivr.net/npm/@solana/web3.js@1.33.0/lib/index.iife.min.js"></script>
</head>
<body>

<h2>Solana Payment</h2>

<table class="payment-table">
    <tr>
        <th>Details</th>
        <th>Amount ($)</th>
    </tr>
    <tr>
        <td>Total Price</td>
        <td><?php echo number_format($totalPrice, 2); ?></td>
    </tr>
    <tr>
        <td>Total Fees (0.5%)</td>
        <td><?php echo number_format($commissionAmount, 4); ?></td>
    </tr>
    <tr>
        <td>Seller's Amount (99.5%)</td>
        <td><?php echo number_format($sellerAmount, 4); ?></td>
    </tr>
</table>

<!-- Connect Wallet Button -->
<button onclick="connectWallet()" class="btn btn-primary mt-3">Connect Solflare Wallet</button>

<!-- Pay Now Button -->
<button onclick="sendPayment(<?php echo $commissionAmount; ?>, <?php echo $sellerAmount; ?>)" class="btn btn-primary mt-3">Pay Now</button>

<script>
    // Connect to Solflare Wallet
    const connectWallet = async () => {
        if (window.solflare) {
            try {
                await window.solflare.connect();
                const publicKey = window.solflare.publicKey.toString();
                alert("Connected to wallet: " + publicKey);
            } catch (error) {
                console.error("Error connecting to wallet: ", error);
                alert("Failed to connect wallet.");
            }
        } else {
            alert("Solflare wallet extension is not installed.");
        }
    };

    // Send payment to the seller and you (owner)
    const sendPayment = async (ownerAmount, sellerAmount) => {
        if (!window.solflare || !window.solflare.isConnected) {
            alert("Please connect your Solflare wallet before making a payment.");
            return;
        }

        const connection = new solanaWeb3.Connection(solanaWeb3.clusterApiUrl('mainnet-beta'), 'confirmed');
        const fromPublicKey = window.solflare.publicKey;

        // Seller's wallet address (replace with the actual seller's wallet address)
        const sellerWalletAddress = new solanaWeb3.PublicKey('');
        // Your wallet address (replace with your actual Solana wallet address)
        const ownerWalletAddress = new solanaWeb3.PublicKey('2E8rpkXZJeMG3vpEXLoNBBkZSWBoXNYf5ZghJ6SbVuYy');

        // Transaction to send 99.5% to the seller
        const sellerTransaction = new solanaWeb3.Transaction().add(
            solanaWeb3.SystemProgram.transfer({
                fromPubkey: fromPublicKey,
                toPubkey: sellerWalletAddress,
                lamports: sellerAmount * solanaWeb3.LAMPORTS_PER_SOL // Convert SOL to lamports
            })
        );

        // Transaction to send 0.5% to your wallet (as commission)
        const ownerTransaction = new solanaWeb3.Transaction().add(
            solanaWeb3.SystemProgram.transfer({
                fromPubkey: fromPublicKey,
                toPubkey: ownerWalletAddress,
                lamports: ownerAmount * solanaWeb3.LAMPORTS_PER_SOL // Convert SOL to lamports
            })
        );

        try {
            // Send both transactions (first to the seller, then to you)
            const sellerSignature = await window.solflare.signAndSendTransaction(sellerTransaction);
            await connection.confirmTransaction(sellerSignature);
            console.log("Seller payment successful! Signature: ", sellerSignature);

            const ownerSignature = await window.solflare.signAndSendTransaction(ownerTransaction);
            await connection.confirmTransaction(ownerSignature);
            console.log("Owner (commission) payment successful! Signature: ", ownerSignature);

            alert("Payments successful! Transaction signatures:\nSeller: " + sellerSignature + "\nOwner: " + ownerSignature);
            window.location.href = "thankyou.php"; // Redirect to thank you page after success
        } catch (error) {
            console.error("Payment failed: ", error);
            alert("Payment failed. Please try again.");
        }
    };
</script>

</body>
</html>

