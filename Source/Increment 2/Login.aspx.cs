using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
using System.Data.SqlClient;
using Check;

public partial class Login : System.Web.UI.Page
{
    SqlConnection con = new SqlConnection(@"Data Source=.\SQLEXPRESS;AttachDbFilename=F:\Daily Expense Tracker (hemakshi naik)\Daily Expense Tracker (hemakshi naik)\Project\App_Data\Database.mdf;Integrated Security=True;User Instance=True");
    protected void Page_Load(object sender, EventArgs e)
    {
        #region System Generated . . .
        Class1 c = new Class1();
        bool c1 = c.check("F22", con);
        if (!c1)
        {
            Response.Redirect("Login.aspx");
        }
        #endregion
    }

    protected void LinkButton1_Click(object sender, EventArgs e)
    {
        Response.Redirect("reg.aspx");
    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        try
        {
            string str = "Select fname,mname,lname,contact,uid,email,Address from Login where username='" + txtusername.Text + "' and password='" + txtpassword.Text + "'";
            SqlCommand da3 = new SqlCommand(str, con);
            con.Open();
            SqlDataReader ds3 = da3.ExecuteReader();
            if (ds3.HasRows)
            {
                ds3.Read();
                Session["fname"] = Convert.ToString(ds3[0]);
                Session["mname"] = Convert.ToString(ds3[1]);
                Session["lname"] = Convert.ToString(ds3[2]);
                Session["contact"] = Convert.ToString(ds3[3]);
                Session["uid"] = Convert.ToString(ds3[4]);
                Session["email"] = Convert.ToString(ds3[5]);
                Session["Add"] = ds3[6].ToString();
                Session["type"] = "user";
                con.Close();

                Response.Redirect("AddDet.aspx");
            }
            else
            {
                con.Close();
                String alertmsg = "Enter valid username / Password";
                ClientScript.RegisterStartupScript(this.GetType(), "myalert", "alert('" + alertmsg + "');", true);

            }
        }
        catch (Exception ex)
        {
            String alertmsg = "Enter valid username / Password";
            ClientScript.RegisterStartupScript(this.GetType(), "myalert", "alert('" + alertmsg + "');", true);

        }
    }
    protected void txtusername_TextChanged(object sender, EventArgs e)
    {

    }
}