<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Untitled Document</title>

	<link rel="stylesheet" type="text/css" href="style/vote.css" />
</head>

<body>
  <div id="mainDiv">
      <div id="titleDiv">
        <h1 align="center">Vote page</h1>
      </div>
      
       <div id="signInDiv">
    	<h2 align="">VOTE</h2>
        <hr />
        <form>
        <table width="800px" height="px" align="center" >
          <tr>
              <td width="20%">Enter Voter ID</td>
               <td width="40%">Enter NIC number</td>
              <td width="40%">Select Your Party</td>
              <td width="40%">Select Candidate</td>
          </tr>
          <tr>
          	<td><input name="voterID" type="text" /></td>
            <td><input name="voterNIC" type="text" /></td>
            <td>
            	<select name="partySelect" size="1">
                		<option>--Select party--</option>
                        <option>UNP</option>
                        <option>JVP</option>
                        <option>SLNP</option>
                        <option>EPDP</option>
                        <option>PHD</option>
                        <option>HTV</option>
                </select>
            </td>
            
             <td>
            	<select name="candiSelect" size="1">
                		<option>--Select Candidate--</option>
                        <option>A.B.C. Abeysinghe</option>
                        <option>K.J. Pushpakumara</option>
                        <option>T.R. Lankarathna</option>
                        <option>E.N. Muthukumara</option>
                        <option>B.K. Nayanakala</option>
                        <option>R. Selwarajah</option>
                </select>
            </td>
           </tr>
          
          
        </table>
        
        <table align="center" width="400px" >
        	<tr>
            	<td><button name="candiView" style="width:200px; height:50px;">View Profile</button></td>
                <td><button name="vote" style="width:200px; height:50px;">VOTE</button></td>
            </tr>
            
        
        </table>
        </form>
    
    </div>
   
  </div>
</body>
 </html>