<nav class="container-fluid my-3">
	<ul class="pagination justify-content-center">
		<?php if ($sehife > 1) { ?>
			<li class="page-item">
				<a class="page-link" href="?<?= $sehifeLink ?>sehifeno=1" aria-label="First">
					<span aria-hidden="true">&laquo;&laquo;</span>
					<span class="sr-only">First</span>
				</a>
			</li>
			<li class="page-item">
				<a class="page-link" href="?<?= $sehifeLink ?>sehifeno=<?= $sehife - 1 ?>" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
					<span class="sr-only">Previous</span>
				</a>

			</li>
		<?php } ?>

		<?php
		for ($i = $sehife - $gorunenSehife; $i < $sehife + $gorunenSehife + 1; $i++) {
			// i necedirse o reqemden  başlar 1-2-3-4-5 yazmaga. məs: səhifə 7dəyik 7 - 5 = 2'dir 2-ci səhifədən sonra səhifələməyə başlar yəni 2-3-4-5-6-7

			if ($i > 0 and $i <= $sehife_sayi) {

				if ($i == $sehife) {

					//əgər i ilə səhifə dəyərləri eynidirsə aktiv et
					echo '<li class="page-item active"><a class="page-link" href="?' . $sehifeLink . 'sehifeno=' . $i . '">' . $i . '</a></li>';
				} else {
					echo '<li class="page-item"><a class="page-link" href="?' . $sehifeLink . 'sehifeno=' . $i . '">' . $i . '</a></li>';
				}
			}
		}

		if ($sehife != $sehife_sayi) : ?>
			<li class="page-item">
				<a class="page-link" href="?<?= $sehifeLink ?>sehifeno=<?= $sehife + 1 ?>" aria-label="Next">
					<span class="sr-only">Next</span>
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>
			<li class="page-item">

				<a class="page-link" href="?<?= $sehifeLink ?>sehifeno=<?= $sehife_sayi ?>" aria-label="Next">
					<span class="sr-only">Last</span>
					<span aria-hidden="true">&raquo;&raquo;</span>
				</a>
			</li>
		<?php endif; ?>
	</ul>
</nav>