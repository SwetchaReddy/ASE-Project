using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
using System.Data.SqlClient;

public partial class ViewBaln : System.Web.UI.Page
{
    SqlConnection con = new SqlConnection(@"Data Source=.\SQLEXPRESS;AttachDbFilename=F:\Daily Expense Tracker (hemakshi naik)\Daily Expense Tracker (hemakshi naik)\Project\App_Data\Database.mdf;Integrated Security=True;User Instance=True");
    protected void Page_Load(object sender, EventArgs e)
    {
        LabelUid.Text = Session["uid"].ToString();
        if(Session["Add"] == "Data")
        {
            Page.ClientScript.RegisterStartupScript(GetType(), "msgbox", "<script>alert('Amount Transfered Successfully');</script>");
            Session["Add"] = "";
        }
    }

    protected void Button2_Click(object sender, EventArgs e)
    {
        if (TextBox4.Text != "")
        {
            string s = "update bal set lim='" + TextBox4.Text + "' where uid='" + LabelUid.Text + "'";
            SqlCommand cmd = new SqlCommand(s, con);
            con.Open();
            cmd.ExecuteNonQuery();
            con.Close();
        }
        else
        {
            Page.ClientScript.RegisterStartupScript(GetType(), "msgbox", "<script>alert('Kindly enter expense limit');</script>");
        }
    }
    protected void Button3_Click(object sender, EventArgs e)
    {
        if (Convert.ToInt32(TextBox6.Text) > Convert.ToInt32(TextBox3.Text))
        {
            Page.ClientScript.RegisterStartupScript(GetType(), "msgbox", "<script>alert('Transfer Amount exceeds Savings amount');</script>");
        }
        else
        {
            string str1 = DropDownList1.Text;
            int s = 0;
            SqlDataAdapter da = new SqlDataAdapter("Select max(tid) from exp", con);
            DataSet ds = new DataSet();
            da.Fill(ds);

            if (ds.Tables[0].Rows.Count > 0)
            {
                s = Convert.ToInt32(ds.Tables[0].Rows[0][0]);
                s++;
                Session["tidd"] = Convert.ToString(s);
            }
            else
            {
                Session["tidd"] = "0";
            }
            string mon = DateTime.Now.AddMonths(1).ToString("MM");
            string yr = DateTime.Now.AddMonths(1).ToString("yyyy");

            string query;
            if (str1 != "Transfer to Savings")
            {
                query = "insert into exp values('" + Session["tidd"].ToString() + "','" + LabelUid.Text + "','" + TextBox6.Text + "','" + DropDownList1.Text + "','" + DateTime.Now.ToString("dd") + "','" + DateTime.Now.ToString("MM") + "','" + DateTime.Now.ToString("yyyy") + "')";
            }
            else
            {
                query = "insert into inc values('" + Session["tidd"].ToString() + "','" + LabelUid.Text + "','" + TextBox6.Text + "','" + DropDownList1.Text + "','1','" + mon + "','" + yr + "')";
                string query1 = "insert into exp values('" + Session["tidd"].ToString() + "','" + Session["uid"].ToString() + "','" + TextBox6.Text + "','" + DropDownList1.Text + "','" + DateTime.Now.ToString("dd") + "','" + DateTime.Now.ToString("MM") + "','" + DateTime.Now.ToString("yyyy") + "')";
                SqlCommand cmdd = new SqlCommand(query1, con);
                con.Open();
                cmdd.ExecuteNonQuery();
                con.Close();
            }
            SqlCommand cmd = new SqlCommand(query, con);
            con.Open();
            cmd.ExecuteNonQuery();
            con.Close();

            con.Open();
            string ins1 = "insert into expsp values('" + LabelUid.Text + "','" + DropDownList1.Text + "','" + TextBox6.Text + "')";
            SqlCommand cmd1 = new SqlCommand(ins1, con);
            cmd1.ExecuteNonQuery();
            con.Close();
            Session["Add"] = "Data";
            Response.Redirect("ViewBaln.aspx");
        }
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        string s1 = "select sum(amt) from inc where uid='" + LabelUid.Text + "'";
        SqlDataAdapter sda = new SqlDataAdapter(s1, con);
        DataSet ds = new DataSet();
        sda.Fill(ds);
        TextBox1.Text = ds.Tables[0].Rows[0][0].ToString();

        string s2 = "select sum(amt) from exp where uid='" + LabelUid.Text + "'";
        SqlDataAdapter sda1 = new SqlDataAdapter(s2, con);
        DataSet ds1 = new DataSet();
        sda1.Fill(ds1);
        TextBox2.Text = ds1.Tables[0].Rows[0][0].ToString();

        int sav = Convert.ToInt32(TextBox1.Text) - Convert.ToInt32(TextBox2.Text);
        TextBox3.Text = sav.ToString();

        int i = Convert.ToInt32(TextBox3.Text);
        if (i > 0)
        {
            Button5.Visible = true;
        }
        else
        {
            Button5.Visible = false;
        }

        TextBox5.Text = DateTime.Now.ToShortDateString();
        Panel3.Visible = true;
        Panel1.Visible = true;
     
    }

    protected void Button5_Click(object sender, EventArgs e)
    {
        Button5.Visible = false;
        Panel2.Visible = true;
        Panel3.Visible = true;
    }
}