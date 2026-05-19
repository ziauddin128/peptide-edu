<?php
require "top.php";
?>

<!-- Reconstitution Header -->
<section class="reconstitution-header">
    <div class="container">
        <div class="breadcrumbs mt-2">
            <a href="/">Home</a>
            <i class="fa-solid fa-chevron-right"></i>
            <a href="javascript:void(0)">Products</a>
            <i class="fa-solid fa-chevron-right"></i>
            <span>Reconstitution Calculator</span>
        </div>

        <div class="row mt-5">
            <div class="col-lg-6">
                <div class="reconstitution-header-left">
                    <h4>Precision Pharmacology Tools</h4>
                    <h1>Peptide Reconstitution Calculator</h1>
                    <p>Surgical accuracy for clinical research protocols. Calculate precise volume requirements and dosage concentrations with preset profiles for 20 peptides.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="reconstitution-header-right">
                    <div class="ascension-peptides-card">
                        <div class="ascension-peptides-card-top">
                            <div class="ascension-peptides-card-top-left">
                                <div class="ascension-icon">
                                    <i class="fa-solid fa-flask"></i>
                                </div>
                                <div>
                                    <h4>Partner Vendor</h4>
                                    <h3>Ascension Peptides</h3>
                                </div>
                            </div>
                            <div class="ascension-peptides-card-top-right">
                                <div class="blink-dot"></div>
                                <p>Limited time</p>
                            </div>
                        </div>
                        <div class="ascension-peptides-card-btm">
                            <div class="ascension-peptides-card-btm-left">
                                <div>
                                    <h3>50</h3>
                                    <div>
                                        <h4>%</h4>
                                        <h5>OFF</h5>
                                    </div>
                                </div>
                                <p>Sitewide. Stacks with bulk pricing.</p>
                            </div>
                            <div class="ascension-peptides-card-btm-right">
                                <div class="ascension-discount-code">
                                    <div>
                                        <h4>CODE</h4>
                                        <h2>PEPTIDECK</h2>
                                    </div>
                                    <div class="ascension-discount-copy">
                                        <i class="fa-solid fa-copy"></i>
                                        <span>Tap To Copy</span>
                                    </div>
                                </div>
                                <a href="peptides" class="primary-btn mt-3 justify-content-center">
                                    <span>Explore Peptides</span>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="reconstitution-header-right-btm">
                        <div>
                            <p>Presets</p>
                            <h5>20 Peptides</h5>
                        </div>
                        <div>
                            <p>Syringe</p>
                            <h5>U-100 · 1 mL</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Calculation Comparison -->
<section class="comparison-calculator">
    <div class="container">

        <div class="comparison-calculator-in">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <div><i class="fa-solid fa-jar"></i>
                                <span>BAC Water Comparison</span>
                            </div>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the first item’s accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>


<!-- Safety Disclaimer -->
<section class="safety-disclaimer">
    <div class="container">
        <div class="safety-disclaimer-in">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <div>
                <h4>Safety Disclaimer</h4>
                <p>Always verify calculations with a medical professional. This tool is intended for informational research purposes only. Ensure single-use needles are disposed of in a proper sharps container.</p>
            </div>
        </div>
    </div>
</section>

<!-- How to use -->
<section class="how-to-use">
    <div class="container">
        <h4>How to Use This Reconstitution Calculator</h4>
        <p>When working with lyophilized (freeze-dried) research peptides, reconstitution is the process of adding bacteriostatic water (BAC water) to dissolve the powder into a liquid solution. Getting the math right is critical for accurate dosing.</p>

        <h5>Three inputs, four outputs</h5>
        <ul>
            <li><b>Vial size (mg):</b> The total amount of peptide powder in your vial — usually printed on the label (e.g., 5mg, 10mg, 30mg)</li>
            <li><b>BAC water volume (mL):</b> How much bacteriostatic water you're adding to the vial</li>
            <li><b>Dose per injection (mg):</b> The amount of peptide you want per dose</li>
        </ul>

        <p>The calculator instantly shows concentration (mg/mL), the exact mL to draw per dose, how many doses your vial contains, and the insulin unit (IU) marker on a U-100 syringe.</p>
    </div>
</section>

<!-- Common Reconstitution Examples -->
<section class="common-reconstitution">
    <div class="container">
        <h4>Common Reconstitution Examples</h4>

        <div class="table-responsive">
            <table class="table table-bordered table-striped-hover">
                <tr>
                    <th>Peptide</th>
                    <th>Vial Size</th>
                    <th>BAC Water</th>
                    <th>Concentration</th>
                </tr>
                <tr>
                    <td>BPC-157</td>
                    <td>5mg</td>
                    <td>2mL</td>
                    <td>2.5mg/mL</td>
                </tr>
                <tr>
                    <td>TB-500</td>
                    <td>10mg</td>
                    <td>2mL</td>
                    <td>5mg/mL</td>
                </tr>
                <tr>
                    <td>Retatrutide</td>
                    <td>10mg</td>
                    <td>2mL</td>
                    <td>5mg/mL</td>
                </tr>
                <tr>
                    <td>Semaglutide</td>
                    <td>5mg</td>
                    <td>2mL</td>
                    <td>2.5mg/mL</td>
                </tr>
                <tr>
                    <td>Ipamorelin</td>
                    <td>5mg</td>
                    <td>2mL</td>
                    <td>2.5mg/mL</td>
                </tr>
                <tr>
                    <td>CJC-1295</td>
                    <td>5mg</td>
                    <td>2mL</td>
                    <td>2.5mg/mL</td>
                </tr>
            </table>
        </div>
    </div>
</section>

<!-- How to use -->
<section class="how-to-use">
    <div class="container">
        <h4 class="pt-3">Storage After Reconstitution</h4>
        <p>Once reconstituted, store your peptide solution in the refrigerator (2–8°C / 36–46°F). Most research peptides remain stable for 28–30 days after reconstitution. Never freeze a reconstituted solution.</p>

        <h4 class="pt-3">What Is a Peptide Reconstitution Calculator?</h4>
        <p>A peptide reconstitution calculator is an essential tool for anyone working with lyophilized research peptides. It removes the guesswork from mixing peptide powder with bacteriostatic water by calculating the exact concentration, injection volume, and insulin syringe units for your specific protocol.</p>
        <p>Without a peptide reconstitution calculator, researchers risk dosing errors that can compromise results or waste expensive compounds. Manual math with peptide concentrations — especially when converting between milligrams, milliliters, and insulin units — is error-prone and time-consuming.</p>

        <h4 class="pt-3">Why Use a Peptide Reconstitution Calculator?</h4>
        <ul>
            <li><b>Accuracy:</b> Precise concentration and volume calculations eliminate dosing errors across different peptide vial sizes</li>
            <li><b>U-100 syringe conversion:</b> Instantly see the correct tick mark on a standard U-100 insulin syringe — no more mental math converting mL to units</li>
            <li><b>Vial planning:</b> Know exactly how many doses each vial provides so you can plan research timelines and reorder peptides accordingly</li>
            <li><b>Flexibility:</b> Quickly compare different BAC water volumes to find the concentration that works best for your syringe and dosing needs</li>
        </ul>

        <h4 class="pt-3">Step-by-Step Peptide Reconstitution Guide</h4>
        <ol>
            <li><b>Check the vial label —</b> note the total peptide content in milligrams (e.g., 5mg BPC-157, 10mg TB-500)</li>
            <li><b>Choose your BAC water volume —</b> common choices are 1mL, 2mL, or 3mL. Less water means a more concentrated solution (fewer units per dose), while more water makes it easier to measure small doses accurately</li>
            <li><b>Enter your desired dose —</b> input how many milligrams or micrograms you want per administration</li>
            <li><b>Read the results —</b> the peptide reconstitution calculator shows your concentration, exact draw volume, insulin units, and total doses per vial</li>
            <li><b>Draw and inject —</b> use the U-100 syringe visualization to confirm the correct tick mark before each dose</li>
        </ol>

        <h4 class="pt-3">Peptide Reconstitution Calculator Tips</h4>
        <p>When using this peptide reconstitution calculator, keep in mind that adding more bacteriostatic water creates a more dilute solution. This can be helpful for peptides requiring very small doses (like BPC-157 at 250mcg), where drawing 0.1mL from a concentrated solution is difficult to measure accurately on a syringe. Conversely, for higher-dose peptides, less water keeps injection volumes small and comfortable.</p>
        <p>Always use bacteriostatic water (not sterile water) for reconstitution. The 0.9% benzyl alcohol preservative in BAC water inhibits bacterial growth and allows multi-dose use from a single vial over several weeks. Sterile water contains no preservative and should only be used for single-dose applications.</p>
    </div>
</section>

<?php
require "footer.php";
?>