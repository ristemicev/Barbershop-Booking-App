<div>
    <?php if ($ses_data['type'] === 'u') {
        echo "Welcome ";
        echo $ses_data['name'];
        echo " ";
        echo $ses_data['surname'];
    } else
        echo "Welcome ";
        echo $ses_data['name'];
        ?>
</div>
